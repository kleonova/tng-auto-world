@extends('layouts.main')
 
@section('title', 'Tag info')

@section('content')
    <dl class="row">
        <dt class="col-sm-3">Tag</dt>
        <dd class="col-sm-9">{{ $tag->title }}</dd>

        <dt class="col-sm-3">Color</dt>
        <dd class="col-sm-9">{{ $tag->color }}</dd>

        <dt class="col-sm-3">Cars</dt>
        <dd class="col-sm-9">
            <ul>
                @foreach ($tag->cars as $car)
                    <li>{{ $car->brand->title . ' ' . $car->model . ' ' . $car->vin  }} </li>
                @endforeach
            </ul>
        </dd>
    </dl>

    <div class="">
        @if (!$tag->deleted_at)
            <form action="{{ route('tags.destroy', $tag->id) }}" method="post" class="d-flex justify-content-start align-items-end">
                @csrf
                @method('DELETE')
                <a href="{{ route('tags.edit', [ $tag->id ]) }}" class="btn btn-outline-secondary btn-sm me-1">Edit...</a>
                <button type="submit" class="btn btn-outline-secondary btn-sm me-1">Delete</button>
            </form>  
        @else
            <span class="text-danger">Tag was deleted. I should think about restore...</span>
        @endif
    </div>
@stop