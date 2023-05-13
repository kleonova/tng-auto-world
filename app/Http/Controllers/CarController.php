<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }

    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|min:3|max:100',
            'model' => 'required|min:3|max:100',
            'price' => 'required|integer|multiple_of:1000',
            'created_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'avatar' => 'required|file'
        ]);

        $fileName = time().'.'.$request->avatar->extension();         
        $request->avatar->move(public_path('uploads/cars'), $fileName);

        $car = Car::create(array_merge($validated, ['avatar' => $fileName]));
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
    public function edit(Request $request, string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        return view('cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);

        $validated = $request->validate([
            'brand' => 'required|min:3|max:100',
            'model' => 'required|min:3|max:100',
            'price' => 'required|integer|multiple_of:1000',
            'created_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
        ]);

        $car -> update($validated);
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
