<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeCustomer extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id'];

    protected $table = 'stripe_customers';

   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
