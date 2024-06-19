<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
       
       <a href="{{ route('admin.property.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Publiez un nouveau bien </a>
       <button id="premiumSubscribeButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Devenir premium</button>


    </div>
    </x-slot>

    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
         <div class="py-12 z-0">
         <div class="container mx-auto px-4 z-0">
        <div class="text-center">
        <h2 class="text-2xl font-bold mb-4">Vos Publications </h2>
        

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 z-0 ">
            @foreach($properties as $property)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    @if($property->getPicture())
                        <img src="{{ $property->getPicture()->getImageUrl(800, 430) }}" alt="" class="w-full h-48 object-cover">
                    @else
                        <img src="/empty.jpg" alt="" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-4">

                       <x-dropdown align="right" width="48" >
                    <x-slot name="trigger">
                    
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="z-200">
                        <div >
                        <x-dropdown-link href="{{ route('admin.property.edit', $property) }}" class="text-blue-500 hover:text-blue-700 center">
                            {{ __('Editer') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form action="{{ route('admin.property.destroy', $property) }}" method="post" class="inline">
                        @csrf
                        @method("delete")
                        <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                        </form>

                        </div>
                    </x-slot>
                </x-dropdown>

                        <h5 class="text-xl font-bold">
                            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="text-blue-500 hover:text-blue-700">{{ $property->title }}</a>
                        </h5>
                        <p class="text-gray-600">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
                        <div class="text-blue-500 font-bold text-lg z-0">

                
                            {{ number_format($property->price, thousands_separator: ' ') }} €
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
       </div>
        </div>



        </tbody>
    </table>


    





</x-app-layout>