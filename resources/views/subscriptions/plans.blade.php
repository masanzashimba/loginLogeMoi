<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Devenir Premium') }}
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
        @foreach($plans as $plan)
    <!-- Card -->
    <div class="flex flex-col border-2 border-indigo-600 text-center shadow-xl rounded-xl p-8 dark:border-indigo-700">
        <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">{{ $plan->title }}</h4>
        <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">$</span>
            {{ $plan->getPrice() }} {{-- Utilisez une méthode pour récupérer le prix --}}
        </span>
        <p class="mt-2 text-sm text-gray-500">{{ $plan->description }}</p>

        <a href="{{ route('subscriptions', ['plan' => $plan->slug]) }}" class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"  >
            Sign up
        </a>
    </div>
    <!-- End Card -->
@endforeach

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Pricing -->
</x-app-layout>



