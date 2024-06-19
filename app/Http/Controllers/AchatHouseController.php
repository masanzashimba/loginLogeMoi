<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class AchatHouseController extends Controller
{
    
    public function showAchatPage()
    {
        $allProperties = Property::with('pictures')
        ->where('type', 'vente') // Filtrer par type "location"
        ->orderBy('created_at', 'desc')
        ->get();

     return view('achat', ['allProperties' => $allProperties]);
    }
    
}
