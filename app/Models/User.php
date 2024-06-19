<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
// use Stripe\StripeClient;
use App\Models\Subscription;
use Illuminate\Support\Str;
use Stripe\SetupIntent;
// use Laravel\Cashier\Subscription;

// use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable  implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable,HasRolesAndPermissions,Billable;
    
    // use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function stripeCustomer()
    {
        return $this->hasOne(StripeCustomer::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function getRedirectRoute()
    {
        if ($this->hasRole('admin')) {
            return 'admindashboard';
        }elseif ($this->hasRole('propriétaire')){
            return 'userdashboard';
            # code...
        }
    }
    // Dans le modèle User
       public function premiumAccount()
    {
    return $this->hasOne(PremiumSubscription::class);
    }


    // Dans models/User.php

    public function createSetupIntent()
    {
        try {
            $stripe = new \Stripe\StripeClient('sk_test_51PEZ5DBuRzcFfsWqcrjON4AIJB33ziQYunsNfJ1M1Rwnbct16wmr4GkOGjy6lstj4T9uDq0kG0qtxpqZD0TuFmXo006MtoWiVZ');
            $setupIntent = $stripe->setupIntents->create(['payment_method_types' => ['card']]);
            return $setupIntent; // Retournez l'objet SetupIntent créé ici
        } catch (\Exception $e) {
            // Gérer l'exception si nécessaire
            return null;
        }
    }

  // ...

    /**
     * Crée un nouvel abonnement pour l'utilisateur avec un stripe_id unique.
     *
     * @param float $stripePrice Le prix Stripe de l'abonnement.
     * @return Subscription L'abonnement créé.
     */
    public function newSubscription($stripePrice)
    {
        // Générer un stripe_id unique pour cet utilisateur s'il n'en a pas déjà un
        $this->generateUniqueStripeId();

        // Chargez la clé API Stripe
        \Stripe\Stripe::setApiKey('sk_test_51PEZ5DBuRzcFfsWqcrjON4AIJB33ziQYunsNfJ1M1Rwnbct16wmr4GkOGjy6lstj4T9uDq0kG0qtxpqZD0TuFmXo006MtoWiVZ');

        // Vérifiez si un abonnement avec ce stripe_id existe déjà pour cet utilisateur
        $existingSubscription = $this->subscriptions()->where('stripe_id', $this->stripe_id)->first();

        if ($existingSubscription) {
            // S'il existe déjà un abonnement avec ce stripe_id, vous pouvez soit ignorer la création d'un nouvel abonnement, soit mettre à jour l'abonnement existant.
            return $existingSubscription;
        } else {
            // S'il n'existe pas d'abonnement avec ce stripe_id, créez un nouvel abonnement
            $subscription = new Subscription([
                'user_id' => $this->id,
                'stripe_id' => $this->stripe_id,
                'stripe_status' => 'active', // ou toute autre valeur appropriée
                'type' => 'premium', // Remplacez 'default' par la valeur appropriée
                'stripe_price' => $stripePrice, // Remplacez null par la valeur appropriée
                'quantity' => null, // Remplacez null par la valeur appropriée
                'trial_ends_at' => null, // Remplacez null par la valeur appropriée
                'ends_at' => null, // Remplacez null par la valeur appropriée
            ]);

            // Enregistrez l'abonnement en base de données
            $subscription->save();

            // Retournez l'objet Subscription nouvellement créé
            return $subscription;
        }
    }
    
    
public function getStripePriceAttribute()
{
    // Récupérez le prix du plan d'abonnement de l'utilisateur
    $subscription = $this->subscriptions()->latest()->first();

    if ($subscription) {
        return $subscription->stripe_price;
    }

    return null;
}



 // Méthode pour générer un stripe_id unique
 protected function generateUniqueStripeId()
 {
     if (!$this->stripe_id) {
         $this->stripe_id = Str::uuid()->toString();
         $this->save();
     }
 }








    // public static function boot()
    // {
    //     parent::boot();

    //     // Charge Stripe SDK
    //     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    // }

    // /**
    //  * Crée un nouvel abonnement pour l'utilisateur.
    //  *
    //  * @param string $planId L'ID du plan d'abonnement
    //  * @return \Laravel\Cashier\Subscription
    //  */
    // public function subscribeToPlan($planId)
    // {
    //     return $this->newSubscription('main', $planId)->create($this->stripeToken);
    // }

    /**
     * Annule l'abonnement actuel de l'utilisateur.
     */
    // public function cancelSubscription()
    // {
    //     $this->subscription->cancel();
    // }
// public function createAsStripeCustomer()
//     {
//         $stripe = new \Stripe\Stripe(config('services.stripe.secret'));
//         $customer = $stripe->customers->create([
//             'description' => 'Customer for user #'. $this->id,
//         ]);

//         $this->stripeCustomer()->updateOrCreate(
//             ['stripe_customer_id' => $customer['id']],
//             ['stripe_customer_id' => $customer['id']]
//         );

//         return $customer;
//     }




}
