@extends('layouts.main')
 
@section('title', 'Create tag')
 
@section('content')
    <x-form action="{{ route('tags.store') }}" method="POST">
        @include('tags.components.form')
        <x-form-submit />
    </x-form>
@stop