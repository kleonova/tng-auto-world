<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarSaveRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use App\Models\Brand;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('brand')->orderBy('created_at')->get();
        $transmissions = config('app-cars.transmissions');
        return view('cars.index', compact('cars', 'transmissions'));
    }

    /**
     * Display deleted cars.
     */
    public function trash() {
        $cars = Car::with('brand')->onlyTrashed()->orderBy('deleted_at')->get();
        $transmissions = config('app-cars.transmissions');
        return view('cars.trash', compact('cars', 'transmissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        return view('cars.create', compact('transmissions', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarSaveRequest $request)
    {
        // dd($request);
        $car = Car::create($request->validated());

        return redirect()->route('cars.show', ['car' => $car->id])->with('alert', trans('app-cars-alert.cars.created', ['name' => $car->brand->title.' '.$car->model]));
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
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::orderBy('title')->pluck('title', 'id');

        return view('cars.edit', compact('car', 'transmissions', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        $car->update($request->validated());
        
        return redirect()->route('cars.show', ['car' => $car->id])->with('alert', trans('app-cars-alert.cars.edited', ['name' => $car->brand->title.' '.$car->model]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car -> delete();
        return redirect()->route('cars.index')->with('alert', trans('app-cars-alert.cars.deleted', ['name' => $car->brand->title.' '.$car->model]));
    }

    /**
     * Restore car.
     */
    public function restore(string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        
        if (Car::where('vin', $car->vin)->exists()) {
            return redirect()->route('cars.trash')->with('alert', trans('app-cars-alert.cars.restore-fail-vin', ['vin' => $car->vin]));
        }

        $car->restore();
        
        return redirect()->route('cars.trash')->with('alert', trans('app-cars-alert.cars.restored', ['name' => $car->brand->title.' '.$car->model]));
    }
}
