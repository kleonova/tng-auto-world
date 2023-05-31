@extends('layouts.main')
 
@section('title', 'Show car')

@section('aside')
    <a href="{{ route('cars.index') }}">Catalog</a>
@stop
 
@section('content')
    <dl class="row">
        <dt class="col-sm-3">Brand</dt>
        <dd class="col-sm-9">{{ $car->brand->title }}</dd>

        <dt class="col-sm-3">Model</dt>
        <dd class="col-sm-9">{{ $car->model }}</dd>

        <dt class="col-sm-3">Vin number</dt>
        <dd class="col-sm-9">{{ $car->vin }}</dd>

        <dt class="col-sm-3">Transmission</dt>
        <dd class="col-sm-9">{{ $transmissions[$car->transmission] }}</dd>

        <dt class="col-sm-3">Year</dt>
        <dd class="col-sm-9">{{ $car->created_year }}</dd>

        <dt class="col-sm-3">Price</dt>
        <dd class="col-sm-9">{{ $car->price }}</dd>

        <dt class="col-sm-3">Tags</dt>
        <dd class="col-sm-9">
            <ul>
                @foreach ($car->tags as $tag)
                    <li>{{ $tag->title }}</li>
                @endforeach
            </ul>
        </dd>
    </dl>

    <div class="">
        @if (!$car->deleted_at)
            <form action="{{ route('cars.destroy', $car->id) }}" method="post" class="d-flex justify-content-start align-items-end">
                @csrf
                @method('DELETE')
                <a href="{{ route('cars.edit', [ $car->id ]) }}" class="btn btn-outline-secondary btn-sm me-1">Edit...</a>
                <button type="submit" class="btn btn-outline-secondary btn-sm me-1">Delete</button>
            </form>  
        @else
            <span class="text-danger">Car was deleted. I should think about restore...</span>
        @endif
    </div>
@stop