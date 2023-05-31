@extends('layouts.main')
 
@section('title', 'Tags Auto World')

@section('content')
    <section class="d-flex flex-column">
        <h1>Tags</h1>
        <a href="{{ route('tags.create') }}">Create new tag...</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Color</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>{{ $tag->color }}</td>
                        <td>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="post" class="d-flex justify-content-end align-items-end">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm me-1">Delete</button>
                                <a href="{{ route('tags.edit', [ $tag->id ]) }}" class="btn btn-primary btn-sm me-1">Edit...</a>
                                <a href="{{ route('tags.show', [ $tag->id ]) }}" class="btn btn-secondary btn-sm">Details</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @if (!count($tags))
            <div>I don't have any records!</div>
        @endif
    </section>
@stop