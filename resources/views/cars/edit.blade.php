@extends('layouts.main')
 
@section('title', 'Edit car')

@section('aside')
    <a href="{{ route('cars.index') }}">Catalog</a>
@stop
 
@section('content')
    <x-form action="{{ route('cars.update', [ $car->id ]) }}" method="put">
        @bind($car)
            @include('cars.components.form')
        @endbind



        <x-form-submit />
    </x-form>
@stop

