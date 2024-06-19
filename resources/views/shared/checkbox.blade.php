@php
$class ??= null;
@endphp
<div @class(["form-check form-switch", $class])>
    <input type="hidden" value="0" name="{{ $name }}">
   
   

    <input @checked(old($name, $value ?? false)) type="checkbox"  value="1" name="{{ $name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block p-2.5 @error($name) is-invalid @enderror" role="switch" id="{{ $name }}">
    <label class="text-sm font-medium text-gray-900 block mb-2" for="{{ $name }}">{{ $label }}</label>
   

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
