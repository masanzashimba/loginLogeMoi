<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\venteController;
use App\Http\Controllers\AchatHouseController;
use App\Http\Controllers\DureelimiteController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CheckoutController;


use App\Http\Controllers\Account\AccountController;

use App\Http\Controllers\Subscriptions\PlanController;
use App\Http\Controllers\Subscriptions\SubscriptionController;







use App\Http\Controllers\CreatePortalSessionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/biens', [\App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex
]);
Route::post('/biens/{property}/contact', [\App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);





// Route::get('/start-payment/{property}', [PropertyController::class, 'startPayment'])->name('start-payment');


Route::get('/images/{path}', [\App\Http\Controllers\ImageController::class, 'show'])->where('path', '.*');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () use ($idRegex) {
   Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
   Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)->except(['show']);
   Route::delete('picture/{picture}', [\App\Http\Controllers\Admin\PictureController::class, 'destroy'])
       ->name('picture.destroy')
       ->where([
           'picture' => $idRegex,
       ]);
});



Route::get('/dashboard',[ProfileController::class,'dashboard'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::view('success','success')
->middleware(['auth', 'verified'])->name('success');


Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'verified'])->name('admindashboard');

Route::get('/userdashboard', function () {
    return view('userdashboard');
})->middleware(['auth', 'verified'])->name('userdashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
   

});

// Route::get('/success', [PropertyController::class, 'startPayment'])->name('success');

Route::get('/vente', [venteController::class, 'showVentePage'])->name('vente');
Route::get('/achat', [AchatHouseController::class, 'showAchatPage'])->name('achat');
Route::get('/biencourteduree', [DureelimiteController::class, 'showCourtedureePage'])->name('locationdurelimite');
// Route::post('/premium/subscribe', 'PremiumController@subscribe')->name('premium.subscribe');

// Route::get('/count/subscribe', 'PremiumController@subscribe')->name('count.subscribe');

// Route::post('/premium/subscribe', [App\Http\Controllers\PremiumController::class, 'subscribe'])->name('premium.subscribe');

// Route::get('/premium/success', [App\Http\Controllers\PremiumController::class, 'success'])->name('premium.success');
// Route::get('/premium/cancel', [App\Http\Controllers\PremiumController::class, 'cancel'])->name('premium.cancel');


// Route::view('create-subscription-session','create-subscription-session')->middleware(['auth','verified'])->name('create-subscription-session');
// Route::get('/checkout', [CheckoutController::class, 'showPricingPage'])->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');


// Route::get('checkout/{plan?}', CheckoutController::class)
//     ->middleware(['auth', 'verified'])
//     ->name('checkout');

// Route::view('success', 'success')
//     ->middleware(['auth', 'verified'])
//     ->name('success');



Route::post('/webhook', 'App\Http\Controllers\CheckoutController@handleStripeWebhook')->name('webhook');;


//nouvelle test
Route :: post ( 'webhook/endpoint' , [ WebhookController :: class , 'handle' ]);
// Définition de la route



Route::post('/create-subscription-session', [CheckoutController::class, 'createSubscriptionSession'])->name('create.subscription.session');

Route::post('/manage-billing', [CreatePortalSessionController::class, 'create'])->name('manage.billing');




Route::group(['namespace' => 'Subscriptions'], function () {
    Route::get('plans', [PlanController::class, 'index'])->name('subscriptions.plans');
    Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('subscriptions', [SubscriptionController::class, 'store']);
});






require __DIR__.'/auth.php';
