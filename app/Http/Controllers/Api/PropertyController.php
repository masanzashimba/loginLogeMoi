<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    public function index()
    {
        return Property::all();
    }

    public function store(Request $request)
    {
        // Validez les données entrantes si nécessaire
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required',
            'description' => 'nullable',
            'surface' => 'nullable|numeric',
            'rooms' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'floor' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'city' => 'nullable',
            'address' => 'nullable',
            'postal_code' => 'nullable',
            'sold' => 'nullable|boolean',
            'type' => 'nullable',
            'options' => 'nullable|array',
            'options.*.id' => 'exists:options,id',
            'pictures' => 'nullable|array',
            'pictures.*.filename' => 'required|string',
        ]);

        // Créez la propriété
        $property = Property::create($request->only([
            'user_id', 'title', 'description', 'surface', 'rooms', 'bedrooms',
            'floor', 'price', 'city', 'address', 'postal_code', 'sold', 'type'
        ]));

        // Attachez les options à la propriété
        if ($request->has('options')) {
            foreach ($request->options as $option) {
                $property->options()->attach($option['id']);
            }
        }

        // Ajoutez les images à la propriété
        if ($request->has('pictures')) {
            foreach ($request->pictures as $pictureData) {
                $picture = new Picture([
                    'filename' => $pictureData['filename'],
                ]);
                $property->pictures()->save($picture);
            }
        }

        // Retournez la propriété créée avec ses relations
        return new PropertyResource($property);
    }

    public function show(Property $property)
    {
        return new PropertyResource($property);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        // Validez les données entrantes si nécessaire
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'title' => 'sometimes',
            // Ajoutez d'autres règles de validation au besoin pour les autres champs
            'options' => 'nullable|array',
            'options.*.id' => 'exists:options,id',
            'pictures' => 'nullable|array',
            'pictures.*.filename' => 'required|string',
        ]);

        // Mettez à jour les attributs de la propriété
        $property->update($request->only([
            'user_id', 'title', 'description', 'surface', 'rooms', 'bedrooms',
            'floor', 'price', 'city', 'address', 'postal_code', 'sold', 'type'
        ]));

        // Mettez à jour les options associées
        if ($request->has('options')) {
            $property->options()->sync($request->options);
        }

        // Mettez à jour les images associées (à implémenter selon votre logique)

        return new PropertyResource($property);
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Supprimez toutes les images associées à la propriété
        foreach ($property->pictures as $picture) {
            $picture->delete();
        }

        // Supprimez la propriété elle-même
        $property->delete();

        return response()->json(['message' => 'Propriété et ses images supprimées avec succès']);
    }
}
