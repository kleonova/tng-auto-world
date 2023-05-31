@extends('layouts.main')
 
@section('title', 'Brand Auto World')

@section('content')
    <section class="d-flex flex-column">
        <h1>Brand {{ $brand->title }}</h1>
        <p>{{ $brand->description }}</p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Model</th>
                    <th scope="col">Vin</th>
                    <th scope="col">Transmission</th>
                    <th scope="col">Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brand->cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->vin }}</td>
                        <td>{{ $car->transmission }}</td>
                        <td>{{ $car->created_year }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@stop