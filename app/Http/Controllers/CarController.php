<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarSaveRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function trash() {
        $cars = Car::onlyTrashed()->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options = config('app-cars.bodyStyles');

        return view('cars.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarSaveRequest $request)
    {
        if ($request?->avatar) {
            $fileName = time().'.'.$request->avatar->extension();         
            $request->avatar->move(public_path('uploads/cars'), $fileName);
        } else {
            $fileName = 'default.jpg';
        }

        $car = Car::create(array_merge($request->validated(), ['avatar' => $fileName]));

        return redirect()->route('cars.show', ['car' => $car->id])->with('success', 'Car '.$car->brand.' '.$car->model.' has been created successfully');;
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
        $options = config('app-cars.bodyStyles');

        return view('cars.edit', ['car' => $car, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        $car->update(array_merge($request->validated(), ['avatar' => $car->avatar]));
        
        return redirect()->route('cars.show', ['car' => $car->id])->with('success', 'Car '.$car->brand.' '.$car->model.' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car -> delete();

        return redirect()->route('cars.index')->with('success', 'Car '.$car->brand.' '.$car->model.' has been deleted successfully');
    }

    /**
     * Restore car.
     */
    public function restore(string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        $car->restore();
        return redirect()->route('cars.trash')->with('success', 'Car '.$car->brand.' '.$car->model.' has been restored successfully');
    }
}
