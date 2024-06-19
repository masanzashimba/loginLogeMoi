@php
    $type ??= 'text';
    $class ??= null;
    $selected ??= 'location';
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $iconClass = $icon ?? '';
@endphp

<div @class(["form-group", $class])>
    <div class="mx-0 mb-1 sm:mb-4">
        <label for="{{ $name }}" class="text-sm font-medium text-gray-900 block mb-2">
            {{ $name }} 
        </label>
    </div>
    @if($type === 'textarea')
        <textarea class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0 @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" cols="30" rows="5" placeholder="Entrer une description pour votre bien...">{{ old($name, $value) }}</textarea>
    @elseif($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
            @foreach($options as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    @else
        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" autocomplete="{{ $name }}" placeholder="{{ $label }}" value="{{ old($name, $value) }}" {{ $type !== 'checkbox' ? 'required' : '' }}>
    @endif

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
