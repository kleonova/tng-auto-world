@extends('layouts.main')
 
@section('title', 'Brands Auto World')

@section('content')
    <section class="d-flex flex-column">
        <h1>Brands</h1>
        <a href="{{ route('brands.create') }}">Create new brand...</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->title }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            <form action="{{ route('brands.destroy', $brand->id) }}" method="post" class="d-flex justify-content-end align-items-end">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm me-1">Delete</button>
                                <a href="{{ route('brands.edit', [ $brand->id ]) }}" class="btn btn-primary btn-sm me-1">Edit...</a>
                                <a href="{{ route('brands.show', [ $brand->id ]) }}" class="btn btn-secondary btn-sm">Details</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @if (!count($brands))
            <div>I don't have any records!</div>
        @endif
    </section>
@stop