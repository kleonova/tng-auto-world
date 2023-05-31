@extends('layouts.main')
 
@section('title', 'Auto World')

@section('aside')
    <div class="mb-2">Place for filter</div>
    <div >
        <a href="{{ route('cars.create') }}" class="btn btn-outline-secondary btn-sm me-1">Add car...</a>
    </div>
@stop

@section('content')
    <h1>Car`s catalog</h1>
    
    <section class="showcase">
        @foreach ($cars as $car)
            <div class="card cars-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="">
                            <p class="fs-6 mb-0">{{ $car->brand->title }}</p>
                            <h5 class="card-title mb-0">{{ $car->model }}</h5>
                            <p class="card-title mb-0">#{{ $car->vin }}</p>
                        </div>
                        <div>
                            <p class="mb-0">{{ $transmissions[$car->transmission] }}</p>
                            <p class="fs-3 mb-0">{{ $car->created_year }}</p>
                        </div>
                    </div>                        
                    <div class="card-text mb-3">
                        <span class="fs-4">${{ $car->price }}</span>
                    </div>

                    <form action="{{ route('cars.destroy', $car->id) }}" method="post" class="d-flex justify-content-end align-items-end">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('cars.edit', [ $car->id ]) }}" class="btn btn-outline-secondary btn-sm me-1">Edit...</a>
                        <button type="submit" class="btn btn-outline-secondary btn-sm me-1">Delete</button>
                        <a href="{{ route('cars.show', [ $car->id ]) }}" class="btn btn-primary btn-sm">Details...</a>
                    </form>           
                </div>
            </div>
        @endforeach

        @if (!count($cars))
            I don't have any records!
        @endif
    </section>
@stop