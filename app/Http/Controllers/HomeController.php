<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        // Récupérer les 4 derniers biens à louer
        $firstFourProperties = Property::with('pictures')
                                       ->where('type', 'location')
                                       ->available()
                                       ->recent()
                                       ->orderBy('created_at', 'desc')
                                       ->limit(4)
                                       ->get();
    
        // Récupérer les 4 biens suivants à louer
        $nextFourProperties = Property::with('pictures')
                                     ->where('type', 'location')
                                     ->available()
                                     ->recent()
                                     ->orderBy('created_at', 'desc')
                                     ->skip(4)
                                     ->limit(4)
                                     ->get();
    
        // Récupérer les 4 derniers biens à vendre
        $firstFourSales = Property::with('pictures')
                                  ->where('type', 'vente') // Filtrer par type "vente"
                                  ->available()
                                  ->recent()
                                  ->orderBy('created_at', 'desc')
                                  ->limit(4)
                                  ->get();
    
        // Récupérer les 4 biens suivants à vendre
        $nextFourSales = Property::with('pictures')
                                 ->where('type', 'vente') // Filtrer par type "vente"
                                 ->available()
                                 ->recent()
                                 ->orderBy('created_at', 'desc')
                                 ->skip(4)
                                 ->limit(4)
                                 ->get();
    
        return view('home', [
            'firstFourProperties' => $firstFourProperties,
            'nextFourProperties' => $nextFourProperties,
            'firstFourSales' => $firstFourSales, // Passer les biens à vendre à la vue
            'nextFourSales' => $nextFourSales, // Passer les biens à vendre suivants à la vue
        ]);
    }
    

    // public function index() {
    //     // Récupérer les 4 derniers biens à louer
    //     $firstFourProperties = Property::with('pictures')
    //                                    ->where('type', 'location') // Filtrer par type "location"
    //                                    ->available()
    //                                    ->recent()
    //                                    ->orderBy('created_at', 'desc')
    //                                    ->limit(4)
    //                                    ->get();
    
    //     // Récupérer les 4 biens suivants à louer
    //     $nextFourProperties = Property::with('pictures')
    //                                  ->where('type', 'location') // Filtrer par type "location"
    //                                  ->available()
    //                                  ->recent()
    //                                  ->orderBy('created_at', 'desc')
    //                                  ->skip(4)
    //                                  ->limit(4)
    //                                  ->get();
    
    //     return view('home', ['firstFourProperties' => $firstFourProperties, 'nextFourProperties' => $nextFourProperties]);
    // }
    
//     public function index() {
//         $firstFourProperties = Property::with('pictures')->available()->recent()->orderBy('created_at', 'desc')->limit(4)->get();
//         $nextFourProperties = Property::with('pictures')->available()->recent()->orderBy('created_at', 'desc')->skip(4)->limit(4)->get();
//         return view('home', ['firstFourProperties' => $firstFourProperties, 'nextFourProperties' => $nextFourProperties]);
//    }
    //
}
