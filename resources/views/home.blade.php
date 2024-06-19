@extends('base')

@section('content')

    <div class="py-12 z-0">
        <div class="container mx-auto px-4 z-0">
        <div class="text-center">
        <h2 class=" lobster-regular">Nos derniers biens en location</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 ">
            @foreach($firstFourProperties as $property)
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
            @foreach($nextFourProperties as $property)
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
          </svg>Voir toutes les maisons </a>
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


@section('recent_sales')

<div class="py-12 z-0">
        <div class="container mx-auto px-4 z-0">
        <div class="text-center">
        <h2 class=" lobster-regular">Nos derniers biens en ventes</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 ">
            @foreach($firstFourSales as $property)
            <div >
                @include('property.card')
            </div>
            @endforeach
        
        </div>
        </div>
       

        <div class="vise">
      <div class="accord">
        
  
        <div id="accord-conte" style="display: none;">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 " style="
    padding-top: 10px;
">
            @foreach($nextFourSales as $property)
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
               <button  aria-label="Voir plus" id="accord-togg"  class="buton-5" role="button">Voir plus</button>
          </div>
        </div>
    </div>
        </div>
        
    </div>

@endsection


@section('sejour_sales')

<div class="py-12 z-0">
        <div class="container mx-auto px-4 z-0">
        <div class="text-center">
        <h2 class=" lobster-regular">Nos derniers biens pour vos séjour à courte durée</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 ">
            @foreach($premierFourProperties as $property)
            <div >
                @include('property.card')
            </div>
            @endforeach
        
        </div>
        </div>
       

        <div class="vise">
      <div class="accord">
        
  
        <div id="accord-conten" style="display: none;">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 " style="
    padding-top: 10px;
">
            @foreach($suivantFourProperties as $property)
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
               <button  aria-label="Voir plus" id="accord-toggl"  class="buton-5" role="button">Voir plus</button>
          </div>
        </div>
    </div>
        </div>
        
    </div>

@endsection










