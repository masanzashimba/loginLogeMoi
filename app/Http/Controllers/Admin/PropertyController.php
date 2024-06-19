<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

use Stripe\Checkout\Session;

class PropertyController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $properties = Property::orderBy('created_at', 'desc')->paginate(25);
        } else {
            $properties = Property::where('user_id', auth()->id())->paginate(25);
        }
        return view('admin.properties.index', compact('properties'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Montpellier',
            'postal_code' => 34000,
            'sold' => false,
        ]);
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(PropertyFormRequest $request)
    // { 

    //     $property = Property::create(['user_id' => auth()->id()] + $request->all());
    //     $property->options()->sync($request->validated('options'));
    //     $property->attachFiles($request->validated('pictures'));

    //     $property = new Property;
    //     $property->type = $request->input('type');
    //     // $property->save();

    //     return to_route('admin.property.index')->with('success', 'Le bien a bien été créé');
    // }

public function store(PropertyFormRequest $request)
{
    $user = Auth::user();
    $publishedPropertiesCount = $user->properties()->count();

    // Vérifier si l'utilisateur a un compte premium ou a publié moins de trois biens
    if ($publishedPropertiesCount >= 3 && !$user->premiumAccount) {
        return redirect()->back()->withErrors(['Vous devez avoir un compte premium pour publier plus de trois biens.']);
    }

    // Logique pour créer un bien
    $property = Property::create(['user_id' => auth()->id()] + $request->all());
    $property->options()->sync($request->validated('options'));
    $property->attachFiles($request->validated('pictures'));

    return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été créé');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {

        if (!auth()->user()->hasRole('admin') && auth()->id() != $property->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
       
        if (!auth()->user()->hasRole('admin') && auth()->id() != $property->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        $property->attachFiles($request->validated('pictures'));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été modifié');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        if (!auth()->user()->hasRole('admin') && auth()->id() != $property->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }
        Picture::destroy($property->pictures()->pluck('id'));
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été supprimé');
  }
    public function authorize($ability, $arguments = [])
    {
        if (auth()->id() != $arguments[0]->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }
    }

    public function startPayment(Property $property)
    {
        // Assurez-vous d'avoir configuré votre clé secrète de Stripe dans.env
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $id = $property->id;
        $price = $property->price;
        $user_id = $property->user_id;
        $title =  $property->title;
        $description =  $property->description;
        $surface =  $property->surface;
        $rooms =  $property->rooms;
        $bedrooms =  $property->bedrooms;
        $floor =  $property->floor;
        $city =  $property->city;
        $address =  $property->address;
        $postal_code =  $property->postal_code;
        $sold =   $property->sold;
        $type =  $property->type;
    
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $title,
                        'description' => $description,
                        // Ajoutez ici d'autres informations de produit si nécessaire
                    ],
                    'unit_amount' => $price * 100, // Stripe utilise les centimes pour les montants
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => 'http://localhost:8000/',
            'payment_intent_data' => [
                'metadata' => [
                    'property_id' => $id,
                    'user_id' => $user_id,
                    'surface' => $surface,
                    'rooms' => $rooms,
                    'bedrooms' => $bedrooms,
                    'floor' => $floor,
                    'city' => $city,
                    'address' => $address,
                    'postal_code' => $postal_code,
                    'sold' => $sold,
                    'type' => $type,
                ],
            ],
        ]);
    
        // Redirige l'utilisateur vers l'URL de la session de paiement
        return redirect($session->url)->with('success', 'Le payement a reussi avec success');
    }
   

public function handleStripeWebhook(Request $request)
{
    $payload = $request->all();
    $sigHeader = $request->header('Stripe-Signature');

    try {
        $event = \Stripe\Webhook::constructEvent(
            $request->getContent(),
            $sigHeader,
            env('STRIPE_WEBHOOK_SECRET')
        );

        if ($event->type == 'payment_intent.succeeded') {
            $intent = $event->data->object;
            $propertyId = $intent->metadata['property_id'];
            $property = Property::find($propertyId);

            if ($property) {
                $property->update(['sold' => false]);
                return response()->json(['status' => 'success'], 200);
            }
        }
    } catch (\Exception $e) {
        // Handle error
        return response()->json(['error' => $e->getMessage()], 400);
    }

    return response()->json(['received' => true], 200);
}

    
    
}
