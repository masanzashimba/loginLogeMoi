<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use  App\Http\Resources\PropertyResource;
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

        $property = Property::create($request->all());

        foreach ($request->pictures as $picture) {
            $property->pictures()->create($picture);
        }
    
        foreach ($request->options as $option) {
            $property->options()->create($option);
        }
    
        return new PropertyResource($property);

    }

    public function show(Property $property)
    {
        return response()->json($property);
    }

    // public function update(PropertyFormRequest $request, Property $property)
    // {
    //     $property->update($request->validated());
    //     $property->options()->sync($request->validated('options'));
    //     $property->attachFiles($request->validated('pictures'));

    //     return response()->json($property);
    // }




    public function update(Request $request, $id)
{
    $property = Property::findOrFail($id);

    // Mise à jour des attributs de la propriété
    $property->update($request->all());

    // Mise à jour des images associées
   


    return new PropertyResource($property);
}











    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Supprimer toutes les images associées au bien
        foreach ($property->pictures as $picture) {
            $picture->delete();
        }
    
        // Supprimer le bien lui-même
        $property->delete();
    
        return response()->json(['message' => 'Bien et ses images supprimés avec succès']);
        // Picture::destroy($property->pictures()->pluck('id'));
        // $picture = Picture::findOrFail($id);
        // $picture->delete();
        // $property->delete();

        // return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
