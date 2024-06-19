<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Price;



class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'stripe_id'
    ];
    public function getPrice()
    {
        // Récupérez le prix à partir de l'API Stripe en utilisant l'ID Stripe du plan
        try {
            \Stripe\Stripe::setApiKey('sk_test_51PEZ5DBuRzcFfsWqcrjON4AIJB33ziQYunsNfJ1M1Rwnbct16wmr4GkOGjy6lstj4T9uDq0kG0qtxpqZD0TuFmXo006MtoWiVZ');

            $price = Price::retrieve($this->stripe_id);

            // Retournez le prix récupéré depuis l'API Stripe
            return number_format($price->unit_amount_decimal / 100, 2); // Le prix est généralement stocké en centimes, donc on le divise par 100 pour l'obtenir en dollars
        } catch (\Exception $e) {
            // Gérer les erreurs si nécessaire
            return null;
        }
    }
}
