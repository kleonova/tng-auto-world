@extends('layouts.main')
 
@section('title', 'Create brand')
 
@section('content')
    <x-form action="{{ route('brands.store') }}" method="POST">
        @include('brands.components.form')
        <x-form-submit />
    </x-form>
@stop