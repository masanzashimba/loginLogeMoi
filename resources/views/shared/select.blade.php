@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>


    <label for="{{ $name }}" class="text-sm font-medium text-gray-900 block mb-2">{{ $label }}</label>
    <select name="{{ $name }}[]"  id="select-state" multiple class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="" data-placeholder="Selectionner une option du bien">
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<script>
new TomSelect("#select-state",{
	maxItems: 3
});
</script>








