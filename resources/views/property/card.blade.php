<div class="bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl cursor-pointer border">
                    <a target="_self" href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"
                       class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></a>
                    <div class="relative">
                        @if($property->getPicture())
                        
                            <img src="{{ $property->getPicture()->getImageUrl(800, 430) }}" alt="" class="w-full object-cover transition-transform duration-300 transform group-hover:scale-105">
                            <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-red-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                <span class="ml-1 text-sm text-slate-400"> </span>
                            </div>
                             <a class="flex justify-center items-center bg-blue-700 bg-opacity-50 z-10 absolute top-0 left-0 w-full h-full text-white rounded-2xl opacity-0 transition-all duration-300 transform group-hover:scale-105 text-xl group-hover:opacity-100"
                                href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" target="_self" rel="noopener noreferrer">
                                Voir détails
                                <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @else
                            <img src="/empty.jpg" alt="" class="w-full object-cover">
                        @endif
                    </div>
                    <div class="p-4">
                        <h5 class="mt-2 font-semibold text-lg leading-tight truncate">
                            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
                        </h5>
                        <p class="text-gray-600"> {{ $property->bedrooms }} Chambre | {{ $property->surface }}m² - {{ $property->city }} | {{ $property->rooms }} pièces</p>
                        <p class="text-gray-400">Adresse: {{ $property->address }} </p>
                        <div class="text-blue-500 font-bold text-lg">
                            {{ number_format($property->price, thousands_separator: ' ') }} $
                        </div>
                    </div>
                </div>