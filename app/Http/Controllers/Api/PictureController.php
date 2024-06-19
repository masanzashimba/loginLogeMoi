<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PictureResource;
use App\Models\Picture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PictureResource::collection(Picture::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'property_id' => 'required|exists:properties,id',
        ]);

        $picture = Picture::create([
            'filename' => $request->filename,
            'property_id' => $request->property_id,
        ]);

        return new PictureResource($picture);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $picture = Picture::findOrFail($id);
        return new PictureResource($picture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $picture = Picture::findOrFail($id);
        
        $request->validate([
            'filename' => 'sometimes|required|string',
            'property_id' => 'sometimes|required|exists:properties,id',
        ]);

        $picture->update($request->only(['filename', 'property_id']));

        return new PictureResource($picture);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $picture = Picture::findOrFail($id);
        $picture->delete();

        return response()->json(['message' => 'Image supprimée avec succès']);
    }
}
