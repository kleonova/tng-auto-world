@extends('layouts.main')
 
@section('title', 'Create car')

@section('aside')
    <a href="{{ route('cars.index') }}">Catalog</a>
@stop
 
@section('content')
    <x-form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @include('cars.components.form')
        <x-form-submit />
    </x-form>
@stop