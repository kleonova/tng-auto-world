@props([
    'class',
	'label',
	'name',
    'value' => ''
])

<div class="{{ $class }}">
    <label for="{{ $name }}" class="">{{ $label }}</label>
    <input 
        type="file" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        value="{{ $errors->any() ? old($name) : $value }}" 
        accept="image/png, image/jpeg" 
        class="form-control"
    >
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
