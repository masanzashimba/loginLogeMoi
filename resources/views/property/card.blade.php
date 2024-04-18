 <div class="bg-white shadow-lg rounded-lg overflow-hidden  zoom d-flex justify-content-center">
    <div class=" new p-2 m-2">
    @if($property->getPicture())
        <img src="{{ $property->getPicture()->getImageUrl(800, 430) }}" alt="" class="w-100">
    @else
        <img src="/empty.jpg" alt="" class="w-100">
    @endif

    </div>
   
    <div class="p-4">
        <h5 class="text-xl font-bold">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </h5>
        <p class="text-gray-600">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-blue-500 font-bold text-lg z-0" >
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>

 
 