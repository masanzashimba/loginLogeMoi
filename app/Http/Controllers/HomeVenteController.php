<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeVenteController extends Controller
{
    

    public function index() {
        // Récupérer les 4 derniers biens à louer
        $firstFProperties = Property::with('pictures')
                                       ->where('type', 'vente') // Filtrer par type "location"
                                       ->available()
                                       ->recent()
                                       ->orderBy('created_at', 'desc')
                                       ->limit(4)
                                       ->get();
    
        // Récupérer les 4 biens suivants à louer
        $nextFProperties = Property::with('pictures')
                                     ->where('type', 'vente') // Filtrer par type "location"
                                     ->available()
                                     ->recent()
                                     ->orderBy('created_at', 'desc')
                                     ->skip(4)
                                     ->limit(4)
                                     ->get();

        
    
        return view('homevente', ['firstFProperties' => $firstFProperties, 'nextFProperties' => $nextFProperties]);
    }
    
    
}
