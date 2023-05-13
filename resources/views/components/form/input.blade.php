@props([
    'class',
	'label',
	'name',
    'placeholder',
	'value' => ''	
])

<div class="{{ $class }}">
    <label for="{{ $name }}" class="">{{ $label }}</label>
    <input 
        type="text" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        value="{{ $errors->any() ? old($name) : $value }}" 
        class="form-control" 
        placeholder="{{ $placeholder }}"
    >                    
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>