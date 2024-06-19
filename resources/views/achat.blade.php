@extends('header')

@section('title', 'acheter')

@section('content')
<header>
<div class="hero">
        <div class="bgrbvente">
            <div class="container">  
           
            <h2 class=" pinyon-script">Welcome</h2>
            
                <h1 class="dm-serif-display-regular">Acheter une maison avec LogeMoi en toute confiance</h1>
             
               
                <p><br>Découvrez votre futur maison chez nous. Nous sommes spécialisés 
                    dans l'immobilier, avec des conseils personnalisés pour chaque client. 
                    Explorez notre catalogue d'appartements, maisons et terrains, et trouvez votre maison parfaite.</p>  
            </div>
        </div>
       
     </div>
</header>
<section>
<div class="py-12 z-0">
    <div class="container mx-auto px-4 z-0">
        <div class="text-center">
            <h2 class="lobster-regular">Nos derniers biens en ventes</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0">
                @foreach($allProperties as $property)
                <div >
                @include('property.card')
            </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- component -->

</section>


   
@endsection
