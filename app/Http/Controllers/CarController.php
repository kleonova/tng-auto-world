<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $fileName = time().'.'.$request->avatar->extension();         
        $request->avatar->move(public_path('uploads/cars'), $fileName);

        $car = Car::create(array_merge($request->validated(), ['avatar' => $fileName]));
        return redirect()->route('cars.show', ['car' => $car->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        return view('cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        return view('cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        // todo add handler files 
        $car = Car::withTrashed()->findOrFail($id);
        $car -> update($request->validate());
        // todo return back ?
        return redirect()->route('cars.show', ['car' => $car->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car -> delete();
        return redirect()->route('cars.index')->with('success', 'Car has been deleted successfully');
    }
}
