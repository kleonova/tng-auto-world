<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create($request->validated());
        return redirect()->route('tags.index')->with('alert', trans('app-cars-alert.tags.created', ['name' => $tag->title]));        
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());        
        return redirect()->route('tags.show', ['tag' => $tag->id])->with('alert', trans('app-cars-alert.tags.edited', ['name' => $tag->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag -> delete();
        return redirect()->route('tags.index')->with('alert', trans('app-tags-alert.tags.deleted', ['name' => $tag->title]));
    }
}
