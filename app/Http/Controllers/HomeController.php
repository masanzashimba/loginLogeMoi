<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $firstFourProperties = Property::with('pictures')->available()->recent()->orderBy('created_at', 'desc')->limit(4)->get();
        $nextFourProperties = Property::with('pictures')->available()->recent()->orderBy('created_at', 'desc')->skip(4)->limit(4)->get();
        return view('home', ['firstFourProperties' => $firstFourProperties, 'nextFourProperties' => $nextFourProperties]);
   }
    //
}
