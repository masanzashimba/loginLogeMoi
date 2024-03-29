<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class venteController extends Controller
{
    public function showVentePage()
    {
        return view('vente');
    }
}



