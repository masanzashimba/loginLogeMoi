<?php

namespace App\Http\Controllers\Api;

use App\Models\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OptionResource;

class OptionController extends Controller
{
    public function index()
    {
        return OptionResource::collection(Option::all());
        //
    }
}
