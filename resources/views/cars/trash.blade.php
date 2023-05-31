@extends('layouts.main')
 
@section('title', 'Car`s trash Auto World')

@section('content')
    <section class="d-flex flex-column">
        <h1>Car`s trash</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Vin</th>
                    <th scope="col">Transmission</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->brand->title }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->vin }}</td>
                        <td>{{ $transmissions[$car->transmission] }}</td>
                        <td>
                            <form action="{{ route('cars.restore', $car->id) }}" method="post" class="d-flex justify-content-end align-items-end">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-danger btn-sm me-1">Restore</button>
                                <a href="{{ route('cars.show', [ $car->id ]) }}" class="btn btn-primary btn-sm">Details...</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @if (!count($cars))
            <div>I don't have any records!</div>
        @endif
    </section>
@stop