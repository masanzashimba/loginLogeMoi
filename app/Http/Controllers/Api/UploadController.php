<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image',
            'property_id' => 'required|exists:properties,id',
        ]);

        $file = $request->file('file');
        $path = $file->store('public/images');

        $picture = Picture::create([
            'filename' => basename($path),
            'property_id' => $request->property_id,
        ]);

        return response()->json(['message' => 'Image téléversée avec succès', 'data' => new PictureResource($picture)]);
    }
}
