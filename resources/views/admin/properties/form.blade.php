@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Créer un bien")

@section('content')


    <div class="bg-white border border-4 rounded-lg shadow relative m-10">

    <div class="flex items-start justify-between p-5 border-b rounded-t">
        <h3 class="text-xl font-semibold">
        @yield('title')
        </h3>
       
    </div>

    <div class="p-6 space-y-6">
        <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">
        @csrf
        @if($property->exists)
            @method('PUT') <!-- Ajoutez cette ligne pour les mises à jour -->
        @endif
       
            <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
            @include('shared.input', ['type' => 'select',
             'class' => 'col',
             'label' => 'Type du bien: Location/vente/appart',
             'name' => 'type',
             'value' => $property->type,
             'options' => [
                   'vente' => 'Bien à vendre',
                   'location' => 'Bien à louer mensuellement',
                   'appart' => 'Bien à louer à séjour limité'
                          ],
                   'selected' => $property->type
                  ])
            </div>


                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'label' => 'Titre du bien ', 'name' => 'title', 'value' => $property->title])

                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'surface','label' => 'Surface (Exemple: 40)' ,'value' => $property->surface])

                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Pièces (2)', 'value' => $property->rooms])
                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres (Ex: 4 )', 'value' => $property->bedrooms])
                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Etage', 'value' => $property->floor])
                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'price', 'label' => 'Prix', 'value' => $property->price])

                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address])

                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city])

                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code])

                </div>
                <div class="col-span-6 sm:col-span-3">
                @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
             
                </div>

                <div class="col-span-full">
                @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])
                </div>

                <div class="col-span-full">
    <div class="flex items-center">
        @if($property->exists)
            @include('shared.checkbox', ['name' => 'sold', 'label' => 'Disponible', 'value' => $property->sold])
        @else
            <input type="hidden" name="sold" value="1">
        @endif
    </div>
</div>




    <div class="col vstack gap-3" style="flex: 25">
         @foreach($property->pictures as $picture)
         <div id="picture{{ $picture->id }}" class="position-relative">
            <img src="{{ $picture->getImageUrl() }}" alt="" class="w-500 d-block timg">
            <button type="button"
                    class="btn btn-danger position-absolute bottom-0 w-100 start-0"
                hx-delete="{{ route('admin.picture.destroy', $picture) }}"
                hx-target="#picture{{ $picture->id }}"
                hx-swap="delete"
            >
                <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <i class="fas fa-xmark delfas" aria-hidden="true" ></i>
<!-- Icône de suppression Font Awesome -->
            </button>
        </div>
    @endforeach
    <div>
        <input type="file" id="imageUpload" name="pictures[]" multiple onchange="previewImages(event)" />
        <div id="imagePreviews" style="display: flex; flex-wrap: wrap;"></div>
    </div>
</div>
<script>
    function previewImages(event) {
        var input = event.target;
        var previews = document.getElementById('imagePreviews');
        previews.innerHTML = ''; // Vide le conteneur de prévisualisation

        for (let i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imgContainer = document.createElement('div');
                imgContainer.style.display = 'inline-block';
                imgContainer.style.position = 'relative';
                imgContainer.style.margin = '5px';

                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '200px';
                img.style.height = 'auto';
                imgContainer.appendChild(img);

                var deleteButton = document.createElement('button');
                deleteButton.innerHTML = ' <i class="fas fa-xmark" aria-hidden="true"></i>'; // Icône de suppression Font Awesome
                deleteButton.style.position = 'absolute';
                deleteButton.style.bottom = '0';
                deleteButton.style.right = '0';
                deleteButton.style.backgroundColor = 'transparent';
                deleteButton.style.color = 'red';
                deleteButton.style.border = 'none';
                deleteButton.style.padding = '5px';
                deleteButton.style.cursor = 'pointer';
                deleteButton.onclick = function() {
                    imgContainer.parentNode.removeChild(imgContainer);
                };
                imgContainer.appendChild(deleteButton);

                previews.appendChild(imgContainer);
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
</script>





        </div>
            </div>
            <div class="p-6 border-t border-gray-200 rounded-b">
        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">@if($property->exists)
                            Modifier
                        @else
                            Créer
                        @endif</button>
    </div>
        </form>
    
    </div>

   

</div>

@endsection
