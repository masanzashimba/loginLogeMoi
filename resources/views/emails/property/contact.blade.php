<x-mail::message>
# Nouvelle demande de Contact


Il y a une nouvelle demande de contact qui a été faites pour le bien
<a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>


- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}


merci d'utilisé notre systeme de messagerie.


- Message: </br>
{{ $data['message'] }}

<!-- <x-mail::button :url="''">
Button Text
</x-mail::button> -->

<!-- Thanks,<br>
{{ config('app.name') }} -->
</x-mail::message>
