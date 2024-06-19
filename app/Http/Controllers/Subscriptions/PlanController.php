<?php

namespace App\Http\Controllers\Subscriptions;
use App\Models\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('subscriptions.plans', [
            'plans' => $plans
        ]);
    }
}
