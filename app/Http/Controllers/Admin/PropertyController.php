<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
    public function store(PropertyFormRequest $request)
    { 

        $property = Property::create(['user_id' => auth()->id()] + $request->all());
        $property->options()->sync($request->validated('options'));
        $property->attachFiles($request->validated('pictures'));

        $property = new Property;
        $property->type = $request->input('type');
        // $property->save();

        return to_route('admin.property.index')->with('success', 'Le bien a bien été créé');
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
    
}
