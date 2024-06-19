<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Event;
use Stripe\StripeClient;


class WebhookController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET_KEY')); // Assuming STRIPE_SECRET_KEY is defined in.env
    }

    public function createCheckoutSession(Request $request)
    {
        $YOUR_DOMAIN = env('APP_URL', 'http://localhost:8000'); // Use APP_URL from.env if available

        $checkout_session = $this->stripe->checkout->sessions->create([
            'line_items' => [[
                'price' => env('PRODUCT_PRICE_ID'), // Assuming PRODUCT_PRICE_ID is defined in.env
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN. '/success.html',
            'cancel_url' => $YOUR_DOMAIN. '/cancel.html',
        ]);

        return redirect()->away($checkout_session->url);
    }
}


