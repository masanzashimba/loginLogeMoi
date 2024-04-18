<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @vite( ['resources/css/app.css', 'resources/js/app.js'])


    <title>@yield('title') | Agence</title>
</head>
<body>
<nav class="nav" >
  <div class="container">
     <h1 class="logo"><a href="/index.html">LogeMoi</a></h1>
        @php
        $route = request()->route()->getName();
        @endphp
     <ul>
      <li><a href="#" class="current">   Home</a></li>
      <li><a href="#">  Acheter</a></li>
      <li> <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])> louer</a></li>
      <li><a href="{{ route('vente') }}">   Vendre</a></li>
      <li><a href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Gérer les biens</a></li>

      <li><a href="#">Recherche d'agent</a></li>
      <li><a href="#">Contact</a></li>

      @if (Route::has('login'))
                
                    @auth
                  <div class="dropdown">
                      <button class="button-61"><i class="fa-solid fa-user"> </i> {{ Auth::user()->name }}</button>

                         <div class="dropdown-content">
                           <a href="{{ route('profile.edit') }}" class="nav-link">
                           {{ __('Profile') }}
                           </a>
                    <!-- Formulaire pour la déconnexion -->
                    <form method="POST" action="{{ route('logout') }}" >
                      @csrf

                         <button type="submit" class="button-39" onclick="event.preventDefault(); this.closest('form').submit();">
                         {{ __('Déconnexion') }}
                         </button>
                     </form>
              
                   

               
           
                </div>
                  @else
                        <li><a href="{{ route('login') }}">    Se connecter</a></li>
                        <!-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> -->

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">  S'inscrire</a></li>
                            <!-- <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> -->
                        @endif
                    @endauth
                </div>
       @endif
   
  </div>
</nav> 


<main style=" background-color: #fff;">

  <div class="espacetop">
  @yield('content')
  </div>

</main>

<script>
  /* font-family: 'Kaushan Script', cursive; */
/* font-family: 'Pinyon Script', cursive; */
/* font-family: 'Petit Formal Script', cursive; */
/* font-family: 'Aguafina Script', cursive; */
/* font-family: 'Rouge Script', cursive; */
// font-family: 'Roboto', sans-serif;
</script>

@include('footer')
</body>
</html>



   

