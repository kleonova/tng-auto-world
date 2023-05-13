@extends('layouts.main')
 
@section('title', 'Show car')

@section('aside')
    <a href="{{ route('cars.index') }}">Catalog</a>
@stop
 
@section('content')
    <div class="">
        <img src="../uploads/cars/{{ $car->avatar }}" class="card-img-top" alt="{{ $car->model }}">
        <div class="">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="">
                    <p class="fs-6 mb-0">{{ $car->brand }}</p>
                    <h5 class="card-title mb-0">{{ $car->model }}</h5>
                </div>
                <div>
                    <p class="fs-3 mb-0">{{ $car->created_year }}</p>
                </div>
            </div>                        
            <div class="card-text mb-3">
                <span class="fs-4">${{ $car->price }}</span>
            </div>
            
            @if (!$car->deleted_at)
                <form action="{{ route('cars.destroy', $car->id) }}" method="post" class="d-flex justify-content-end align-items-end">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('cars.edit', [ $car->id ]) }}" class="btn btn-outline-secondary btn-sm me-1">Edit...</a>
                    <button type="submit" class="btn btn-outline-secondary btn-sm me-1">Delete</button>
                </form>  
            @else
                <span class="text-danger">Car was deleted. I should think about restore...</span>
            @endif
                              
        </div>
    </div>
@stop