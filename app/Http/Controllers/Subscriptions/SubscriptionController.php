<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use App\Models\StripeCustomer;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Laravel\Cashier\Billable; // Assurez-vous que votre modèle User utilise le trait Billable


class SubscriptionController extends Controller
{
   
    public function index(Request $request)
    {

        
        return view('subscriptions.checkout',[
            'intent'=>$request->user()->createSetupIntent()
        ]);
    }
  
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //          'token' => 'required'
    //     ]);

    //     $plan = Plan::where('slug', $request->plan)
    //         ->orWhere('slug', 'monthly')
    //         ->first();

    //     // Utilisez Cashier pour créer l'abonnement
    //     $subscription = $request->user()->newSubscription('default', $plan->stripe_id);
    //     $subscription->create($request->token);

    //     return back();
    // }
    public function store(Request $request)
    {
        $this->validate($request, [
             'token' => 'required'
        ]);
    
        $plan = Plan::where('slug', $request->plan)
            ->orWhere('slug', 'monthly')
            ->first();
    
        if (!$plan) {
            // Gérez le cas où le plan n'est pas trouvé
            return back()->withError('Plan not found');
        }
    
        // Utilisez Cashier pour créer l'abonnement
        $subscription = $request->user()->newSubscription($plan->stripe_id, $plan->price); // Passez l'ID du produit Stripe et le prix du plan
        $subscription->save(); // Utilisez save() pour enregistrer l'abonnement
    
        return back()->withSuccess('Subscription created successfully');
    }
    


}
