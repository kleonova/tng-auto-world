@extends('layouts.main')
 
@section('title', 'Edit car')

@section('aside')
    <a href="{{ route('cars.index') }}">Catalog</a>
@stop
 
@section('content')
    <form action="{{ route('cars.update', [ $car->id ]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')    
        @csrf
        <h2 class="">Edit car # {{ $car->id }}</h2>

        <img src="../../uploads/cars/{{ $car->avatar }}" class="card-img-top" alt="{{ $car->model }}">

        <x-form.input label="Brand" name="brand" placeholder="Enter brand..." value="{{ $car->brand }}" class="mb-4" />
        <x-form.input label="Model" name="model" placeholder="Enter model..." value="{{ $car->model }}" class="mb-4" />
        <x-form.input label="Price" name="price" placeholder="Enter price..." value="{{ $car->price }}" class="mb-4" />
        <x-form.input label="Year" name="created_year" placeholder="1913" value="{{ $car->created_year }}" class="mb-4"/>
        <x-form.select label="Body style" name="body_style" :options="$options" value="{{ $car->body_style }}" placeholder="Choose body style..." class="mb-4" />
        
        <div class="text-right">
            <button class="btn btn-primary" type="submit">Save</button>                        
            <a href="{{ route('cars.show', [ $car->id ]) }}" class="btn btn-outline-primary" type="button">Cancel</a>                        
        </div>                                
    </form>
@stop

