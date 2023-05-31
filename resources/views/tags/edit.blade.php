@extends('layouts.main')
 
@section('title', 'Edit tag')

@section('content')
    <x-form action="{{ route('tags.update', [ $tag->id ]) }}" method="put">
        @bind($tag)
            @include('tags.components.form')
        @endbind

        <x-form-submit />
    </x-form>
@stop

