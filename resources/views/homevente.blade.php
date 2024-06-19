@extends('base')

@section('contente')

    <div class="py-12 z-0">
        <div class="container mx-auto px-4 z-0">
        <div class="text-center">
        <h2  class="lobster-regular">Nos derniers biens en ventes</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 ">
            @foreach($firstFProperties as $property)
            <div >
                @include('property.card')
            </div>
            @endforeach
        
        </div>
        </div>
       

        <div class="vise">
      <div class="accord">
        
  
        <div id="accord-content" style="display: none;">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 ">
            @foreach($nextFProperties as $property)
            <div>
                @include('property.card')
            </div>
            @endforeach
           
        </div> 
        <div class="StyB">
        <button aria-label="More recommended homes" class="Stylebcheck"><a href="{{ route('property.index') }}">
          <svg viewBox="0 0 32 32" aria-hidden="true" data-testid="arrow-down" sx="[object Object]" class="IcoM" focusable="false" role="img">
            <path stroke="none" d="M24.39,16.38a2,2,0,0,0-2.94,0L18,20V7a2,2,0,0,0-4,0V20l-3.45-3.62a2,2,0,0,0-2.94,0,2.16,2.16,0,0,0,0,3l6.86,7a2.2,2.2,0,0,0,3.06,0l6.86-7A2.16,2.16,0,0,0,24.39,16.38Z">

            </path>
          </svg>Voir toutes les ventes </a>
        </button>
      </div></div>


      </div>
  
        <div class="accord-header">
          <div class="stylebox1">
               <button  aria-label="Voir plus" id="accord-toggle"  class="buton-5" role="button">Voir plus</button>
          </div>
        </div>
    </div>
        </div>
        
    </div>

@endsection
















































<!-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
      
        
        
@if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif




    <h1>Bienvenue sur la page d'accueil</h1>
</body>
</html> -->
