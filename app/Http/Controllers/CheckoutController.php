<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Event;


class CheckoutController extends Controller
{
    public function create(Request $request ,string $priceId = 'price_1PHxsCBuRzcFfsWqlqz8shvT')
    {
        // Configurez votre clé secrète Stripe ici
        Stripe::setApiKey('sk_test_51PEZ5DBuRzcFfsWqv44XzZh1fPFut5123822dTyDU3RaCXtaHI6P4HGhBg3BGDoCglU8PlxYh0Z0TkDzOVopHCpq00ymrmyiU2');

        // Récupérez l'ID de prix depuis la requête POST
        $priceId = request()->input('priceId'); // Assurez-vous que 'priceId' est bien passé dans la requête

        $session = Session::create([
            'payment_method_types' => ['card'],

            'success_url' => 'https://example.com/success.html?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://example.com/canceled.html',
            'mode' => 'subscription',
            'line_items' => [[
                'price' => 'price_1PHxsCBuRzcFfsWqlqz8shvT',
                'quantity' => 1,
            ]],
        ]);

        // Redirigez vers l'URL retournée par la session de paiement
        return redirect($session->url);
    }





    public function handleStripeWebhook(Request $request)
    {
        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = Event::constructFrom(json_decode($payload, true));
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        }

        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
                // handlePaymentIntentSucceeded($paymentIntent);
                break;
            case 'payment_method.attached':
                $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
                // handlePaymentMethodAttached($paymentMethod);
                break;
            //... handle other event types
            default:
                echo 'Received unknown event type '. $event->type;
        }

        http_response_code(200);
    }
}
