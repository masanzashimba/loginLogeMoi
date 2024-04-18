
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v3.x.x/dist/cdn.min.js" defer></script>

     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
     <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

     @vite(['resources/css/app.css', 'resources/js/app.js'])




    <title>@yield('title') LogeMoi</title>
</head>
<body>
<main class ="maine">
 <nav class="nav" >
  <div class="container">
     <h1 class="logo"><a href="/">LogeMoi</a></h1>
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

    <div class="carousel-container">
    
      <div class="hero">
        <div class="heros">
            <div class="container">  
            
                <h1>Découvrez votre nouvelle maison simeon</h1>
                <input type="text" name="query" class="search-input" placeholder="Rechercher...">
                <button type="submit" class="search-button">Rechercher</button>
                <p><br>Découvrez votre futur chez nous. Nous sommes spécialisés 
                    dans l'immobilier, avec des conseils personnalisés pour chaque client. 
                    Explorez notre catalogue d'appartements, maisons et terrains, et trouvez votre maison parfaite.</p>  
            </div>
        </div>
       
     </div>

     
     <div class="hero">
        <div class="heron">
            <div class="container">  
            
                <h1> joel Découvrez votre nouvelle maison</h1>
                <input type="text" name="query" class="search-input" placeholder="Rechercher...">
                <button type="submit" class="search-button">Rechercher</button>
                <p><br>Découvrez votre futur chez nous. Nous sommes spécialisés 
                    dans l'immobilier, avec des conseils personnalisés pour chaque client. 
                    Explorez notre catalogue d'appartements, maisons et terrains, et trouvez votre maison parfaite.</p>  
            </div>
        </div>
       
     </div>

     
     <div class="hero">
      <div class="heroe">
        <div class="container">  
            
            <h1>Découvrez votre nouvelle maison</h1>
            <input type="text" name="query" class="search-input" placeholder="Rechercher...">
            <button type="submit" class="search-button">Rechercher</button>
            <p><br>Découvrez votre futur chez nous. Nous sommes spécialisés 
                dans l'immobilier, avec des conseils personnalisés pour chaque client. 
                Explorez notre catalogue d'appartements, maisons et terrains, et trouvez votre maison parfaite.</p>  
        </div>
      </div>
     </div>

    </div>
    <div class="carousel__prev" id="left-button"></div>
    <div  class="carousel__next" id="right-button"></div>
    
 

</main>



@yield('content')


<div class="news" style="
    background-color: rgb(249, 249, 251);
    width: 100%;">


<div class="movie">
<div data-testid="hops-rtb-card-1" class="movie1">
  <div class="Onsite">
    <div>
      <div>
        <div class="StyledCard">
          <div class="StyledBox">
            <picture>
            <img alt="Buy a home" src="{{ asset('images/family-spending-time-together-home.jpg') }}" width="100%" class="Image-c">
            </picture>
          </div>
          <div class="StyledBox">
            <h4 class="Text-0">Acheter une maison</h4>
            <p class="Tec11xt">Trouver ce qui vous convient le mieux ,Vivez l'expérience congolaise avec ces magnifique appartements situé dans un quartier prestigieux, idéal pour les investisseurs à la recherche d'un bien qui apporte une valeur ajoutée. </p>
            <button class="StyledButton">En savoir plus</button>
            <p class="Text-c11n"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div data-testid="hops-rtb-card-1" class="movie1">
  <div class="Onsite">
    <div>
      <div>
        <div class="StyledCard">
          <div class="StyledBox">
            <picture>
             
              <img alt="Buy a home" src="{{ asset('images/loc.jpg') }}" width="100%" class="Image-c">
            </picture>
          </div>
          <div class="StyledBox">
            <h4 class="Text-0">Louez une maison</h4>
            <p class="Tec11xt">Vous cherchez un logement confortable et bien situé dans la ville de kinshasa,Economiser votre temps en cherchant,trouver rapidement votre logement</p>
           
            <form>
            <button type="submit" formaction="{{ route('property.index') }}" class="StyledButton">En savoir plus</button>
            </form>
            <!-- <button type="submit" formaction="{{ route('property.index')}}" class="StyledButton">En savoir plus</button> -->
            <p class="Text-c11n"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div data-testid="hops-rtb-card-1" class="movie1">
  <div class="Onsite">
    <div>
      <div>
        <div class="StyledCard">
          <div class="StyledBox">
            <picture>
              <!-- <source srcset="https://www.zillowstatic.com/bedrock/app/uploads/sites/5/2022/07/Buy_a_home.webp"> -->
              <img alt="Buy a home" src="{{ asset('images/happy-black-parents-with-kids-making-video-call-smart-phone-home.jpg') }}" width="100%" class="Image-c">
            </picture>
          </div>
          <div class="StyledBox">
            <h4 class="Text-0">Vendez votre maison</h4>
            <p class="Tec11xt">Optimisez votre revenu locatif avec notre service de gestion, Au cœur de Kinshasa Notre équipe d'experts vous accompagne à chaque étape de votre projet immobilier, de la recherche de la propriété idéale à la négociation du meilleur prix. Découvrez notre expertise et notre dévouement pour vous aider à réaliser vos rêves immobiliers</p>
            <!-- <button class="StyledButton" action="{{ route('vente') }}">En savoir plus</button> -->
            <form>
            <button type="submit" formaction="{{ route('vente') }}" class="StyledButton">En savoir plus</button>
            </form>

            <p class="Text-c11n"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


</div>



<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">

    <h2 class="featurette-heading fw-normal lh-1">Economisez 50% du mois de commision pour votre compte <span class="text-body-secondary">Logemoi vous facilite la vie </span></h2>
    <p class="lead">Trouvez une maison selon vos moyen, votre emplacement, et selon vos preference</p>
  </div>
  <div class="col-md-5">
  
  <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg> -->
  <img alt="Buy a home" src="{{ asset('images/economie.jpg') }}" width="500" class="Image-c">
  
</div>
</div>

<hr class="featurette-divider">
@yield('recent_sales') 

</body>

@include('footer')


</html>
