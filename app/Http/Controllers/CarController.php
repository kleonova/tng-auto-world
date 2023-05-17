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
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options = require config_path('carbodystyles.php');
        return view('cars.create')->with('options', $options);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        // dd($request);
        if ($request?->avatar) {
            $fileName = time().'.'.$request->avatar->extension();         
            $request->avatar->move(public_path('uploads/cars'), $fileName);
        } else {
            $fileName = 'default.jpg';
        }

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
        $options = require config_path('carbodystyles.php');
        return view('cars.edit', ['car' => $car, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        // todo add handler files 
        $car->update(array_merge($request->validated(), ['avatar' => $car->avatar]));
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
