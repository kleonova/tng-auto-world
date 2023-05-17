@props([
    'class' => '',
	'label' => '',
	'name',
    'placeholder' => '',
	'value' => '',
    'options' => []
])


<div class="{{ $class }}">
    <label for="{{ $name }}" class="">{{ $label }}</label>

    <select class="form-select" name="{{ $name }}" >
        @if (!$value)
            <option disabled selected>{{ $placeholder }}</option>
        @endif

        @foreach ($options as $id => $value)
            <option value="{{ $id }}" @selected($errors->any() ? old($name) == $id : $value == $id )>
                {{ $value }} 
            </option>
        @endforeach

        @if (!count($options))
            <option disabled>Empty select options</option>
        @endif        
    </select>        

    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>