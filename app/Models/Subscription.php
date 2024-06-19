<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions'; // Le nom de votre table de souscription

    protected $fillable = [
        'user_id',
        'stripe_id',
        'stripe_status',
        'type',
        'stripe_price',
        'quantity',
        'trial_ends_at',
        'ends_at',
    ];

    // Si nécessaire, définissez d'autres propriétés de modèle telles que $primaryKey, $timestamps, etc.
}
