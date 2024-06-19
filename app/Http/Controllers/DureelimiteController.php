<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class DureelimiteController extends Controller
{
    //

     
    public function showCourtedureePage()
    {
        $allProperties = Property::with('pictures')
        ->where('type', 'appart') // Filtrer par type "location"
        ->orderBy('created_at', 'desc')
        ->get();

     return view('locationdurelimite', ['allProperties' => $allProperties]);
    }
    
}
