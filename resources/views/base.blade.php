


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

<!-- @vite( ['resources/css/app.css', 'resources/js/app.js']) -->

    <title>@yield('title') LogeMoi</title>
</head>
<body>
<main class ="maine">
    
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/front-view-woman-holding-keys-her-new-house.jpg') }}" class="d-block w-100" alt="Image  1">

        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">


            <div class="esearch-container">
              <form action="esearch.php" method="GET">
                  <input type="text" name="query" class="esearch-input" placeholder="Rechercher...">
                  <button type="submit" class="esearch-button">Rechercher</button>
              </form>
            </div>


            <h1>Devenez membre de notre groupe, et publiez vos bien.</h1>
            <p class="opacity-75">Faites louez vos appartement rapidement ou vendez-le</p>
            
            <p><a class="btn btn-lg btn-primary" href="#">Inscrivez vous</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/fem.jpg') }}" class="d-block w-100" alt="Image  1">

        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">

          <div class="carousel-caption">
            <div class="esearch-container">
              <form action="esearch.php" method="GET">
                  <input type="text" name="query" class="esearch-input" placeholder="Rechercher...">
                  <button type="submit" class="esearch-button">Rechercher</button>
              </form>
          </div>
            <h1>Découvrez votre nouvelle maison</h1>
            <p>Découvrez votre futur chez nous. Nous sommes spécialisés dans l'immobilier, avec des conseils personnalisés pour chaque client. Explorez notre catalogue d'appartements, maisons et terrains, et trouvez votre maison parfaite.</p>
            <p><a class="btn btn-lg btn-primary" href="#">En savoir plus</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/medium-shot-kid-painting-wood.jpg') }}" class="d-block w-100" alt="Image  1">

        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-end">
            <div class="esearch-container">
              <form action="esearch.php" method="GET">
                  <input type="text" name="query" class="esearch-input" placeholder="Rechercher...">
                  <button type="submit" class="esearch-button">Rechercher</button>
              </form>
          </div>
            <h1>Explorez plus en consultant nos biens.</h1>
            <p>Votre logement, notre soucis</p>
            <p><a class="btn btn-lg btn-primary" href="#">Voir nos biens</a></p>
          </div>


          
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    <!-- <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence immobilière LogeMoi</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut cumque dolore error expedita itaque iure iusto magni, molestiae numquam omnis provident quae repellat sint soluta tempora unde voluptate voluptatibus.</p>
        </div>
    </div> -->




<nav class="enav">
  
  <div class="econtainer">
     <h1 class="logo"><a href="/">LogeMoi</a></h1>
        @php
        $route = request()->route()->getName();
        @endphp
     <ul>


  
    
      <li><a href="#" class="ecurrent">   Home</a></li>
      <li><a href="#">    Acheter</a></li>
      <li> <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])> louer</a></li>
      <li><a href="{{ route('vente') }}"></i>   Vendre</a></li>
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
                            <li><a href="{{ route('register') }}"><i class="fa-solid fa-circle-user"></i>    S'inscrire</a></li>
                            <!-- <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> -->
                        @endif
                    @endauth
                </div>
       @endif
      <!-- <li><a href="#"><i class="fa-solid fa-circle-user"></i>    S'inscrire</a></li>
      <li><a href="{{ route('login') }}">    Se connecter</a></li> -->

  </div>
</nav> 
</main>



@yield('content')

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
              <!-- <source srcset="https://www.zillowstatic.com/bedrock/app/uploads/sites/5/2022/07/Buy_a_home.webp"> -->
              <img alt="Buy a home" src="{{ asset('images/loc.jpg') }}" width="100%" class="Image-c">
            </picture>
          </div>
          <div class="StyledBox">
            <h4 class="Text-0">Louez une maison</h4>
            <p class="Tec11xt">Vous cherchez un logement confortable et bien situé dans la ville de kinshasa,Economiser votre temps en cherchant,trouver rapidement votre logement</p>
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

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-body-secondary">See for yourself.</span></h2>
    <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
  </div>
  <div class="col-md-5 order-md-1">
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
  </div>
  <div class="col-md-5">
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
  </div>
</div>

<hr class="featurette-divider">

<!-- /END THE FEATURETTES -->

</div><!-- /.container -->


<!-- FOOTER -->
<footer class="container">
<p class="float-end"><a href="#">Back to top</a></p>
<p>&copy; 2017–2023 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>
<script>
   document.getElementById('accord-toggle').addEventListener('click', function() {
  var content = document.getElementById('accord-content');
  if (content.style.display === 'none') {
    content.style.display = 'block';
    this.textContent = 'Reduire le contenu';
  } else {
    content.style.display = 'none';
    this.textContent = 'Voir plus';
  }
});

document.querySelector('.button-61').addEventListener('click', function() {
    document.querySelector('.dropdown-content').classList.toggle('show');
});


// document.getElementById('logout-link').addEventListener('click', function(event) {
//     event.preventDefault(); // Empêche le comportement par défaut du lien
//     document.getElementById('logout-form').submit(); // Soumet le formulaire
// });


</script>

<script type="text/javascript">
    Tu.tScroll({
      't-element': '.card'
    })
</script>
</body>
</html>
