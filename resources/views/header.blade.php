<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newstyle.css') }}">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


    <title>@yield('title') | Agence</title>
</head>
<body>
<nav class="enav">
  
  <div class="econtainer">
     <h1 class="logo"><a href="/">LogeMoi</a></h1>
        @php
        $route = request()->route()->getName();
        @endphp
     <ul>
      <li><a href="#" class="ecurrent"><i class="fa-solid fa-house"></i>   Home</a></li>
      <li><a href="#"><i class="fa-solid fa-shop-lock"></i>    Acheter</a></li>
      <li> <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])> louer</a></li>
      <li><a href="#"><i class="fa-solid fa-money-check-dollar"></i>   Vendre</a></li>
      <li><a href="#">Recherche d'agent</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#"><i class="fa-solid fa-circle-user"></i>    S'inscrire</a></li>
      <li><p>.</p>
      </li>
      <li><a href="#">    Se connecter</a></li>
      
  </div>

</nav> 


<main >
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


</body>
</html>



   

