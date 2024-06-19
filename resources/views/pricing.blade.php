<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Pricing -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Plans d'abonnement</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Choisissez le plan qui correspond le mieux à vos besoins..</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="mt-12 grid sm:grid-cols-1 lg:grid-cols-3 gap-6 lg:items-center">
            <!-- Card -->
            <div class="flex flex-col border border-gray-200 text-center rounded-xl p-8 dark:border-gray-700">
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Mensuel</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">$</span>
                    4.99
                </span>
                <p class="mt-2 text-sm text-gray-500">No commitments. Cancel anytime.</p>

                <a href="{{ route('checkout', ['plan' => 'price_1PHxsCBuRzcFfsWqlqz8shvT']) }}" class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-100 text-indigo-800 hover:bg-indigo-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-indigo-900 dark:text-indigo-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" >
                    Sign up
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col border-2 border-indigo-600 text-center shadow-xl rounded-xl p-8 dark:border-indigo-700">
                <p class="mb-3"><span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-lg text-xs uppercase font-semibold bg-indigo-100 text-indigo-800 dark:bg-indigo-600 dark:text-white">LE PLUS POPULAIRE</span></p>
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Annuel</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">$</span>
                    34.99
                </span>
                <p class="mt-2 text-sm text-gray-500">Économisez 30 % avec un accès complet pendant 1 an..</p>

                <a href="{{ route('checkout', ['plan' => 'price_1PHxsCBuRzcFfsWqMNY85ivj']) }}" class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" >
                    Sign up
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col border border-gray-200 text-center rounded-xl p-8 dark:border-gray-700">
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Lifetime</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">$</span>
                    174.99
                </span>
                <p class="mt-2 text-sm text-gray-500">Payez une fois. Accès à vie.</p>

                <a href="{{ route('checkout', ['plan' => 'price_1PHxsCBuRzcFfsWql0XjQkTo']) }}" class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-100 text-indigo-800 hover:bg-indigo-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-indigo-900 dark:text-indigo-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" >
                    S'inscrire
                </a>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Pricing -->
</x-app-layout>



<!DOCTYPE html>
<html>
  <head>
    <title>Buy cool new product</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <section>
      <div class="product">
        <img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments" />
        <div class="description">
          <h3>Stubborn Attachments</h3>
          <h5>$20.00</h5>
        </div>
      </div>
      <form action="/checkout.php" method="POST">
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
  </body>
</html>