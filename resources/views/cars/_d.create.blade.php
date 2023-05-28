@extends('layouts.main')
 
@section('title', 'Create car')

@section('aside')
    <a href="{{ route('cars.index') }}">Catalog</a>
@stop
 
@section('content')
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 class="">Create car</h2>

        <x-form.input label="Brand" name="brand" placeholder="Enter brand..." class="mb-4" />
        <x-form.input label="Model" name="model" placeholder="Enter model..." class="mb-4" />
        <x-form.input label="Price" name="price" placeholder="Enter price..." class="mb-4" />
        <x-form.input label="Year" name="created_year" placeholder="1913" class="mb-4"/>
        <x-form.input-file label="Photo" name="avatar" class="mb-4" />
        <x-form.select label="Body style" name="body_style" :options="$options" placeholder="Choose body style..." class="mb-4" />
       
        <div class="text-right">
            <button class="btn btn-primary" type="submit">Save</button>   
            <a href="{{ route('cars.index') }}" class="btn btn-outline-primary">Cancel</a>                     
        </div>                                
    </form>
@stop