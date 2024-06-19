<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- <div id="myModal" class="modal">
    <div class="modal-content"> -->

    <h3 class="mb-4 text-xl font-medium text-gray-900 text-center " >
            Connectez-vous sur LogeMoi
    </h3>
        

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="nom@exemple.com" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder=".............." 
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between">
        <div class="flex items-start">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Se rappeler de moi') }}</span>
            </label>
           
        </div>
        @if (Route::has('password.request'))
                <a class="text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
          
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                  {{ __(' Se connecter') }}
            </button>
          
        </div>
        <div class="text-sm font-medium text-gray-500">
                Non enregistrer?
                <a href="{{ route('register') }}" class="text-blue-700 hover:underline"> Crée un compte</a>

        </div>
    </form>


</x-guest-layout>
