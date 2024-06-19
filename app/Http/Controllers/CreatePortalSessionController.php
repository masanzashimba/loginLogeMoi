<?php

use Illuminate\Http\Request;
use Stripe\StripeClient;
use Stripe\Exception\ApiErrorException;

class CreatePortalSessionController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
    }

    public function create(Request $request)
    {
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($request->input('session_id'));
            $return_url = env('PORTAL_RETURN_URL', 'http://localhost:4242/success.html');

            $session = \Stripe\BillingPortal\Session::create([
                'customer' => $checkout_session->customer,
                'return_url' => $return_url,
            ]);

            return redirect()->away($session->url);
        } catch (ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
