<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'date' => 'required|integer',
            'plate' => 'required',
        ]);

        // Creación de nuevo vehículo
        Vehicle::create([
            'user_id' => auth()->id(), // Asociar con el usuario autenticado
            'brand' => $request->brand,
            'model' => $request->model,
            'date' => $request->date,
            'plate' => $request->plate,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        // Validación
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'date' => 'required|integer',
            'plate' => 'required',
        ]);

        // Actualización del vehículo
        $vehicle->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'date' => $request->date,
            'plate' => $request->plate,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }


    // public function index()
    // {
    //     $vehicles = Vehicle::all();
    //     return view('vehicles.index', compact('vehicles'));
    // }

    // public function create()
    // {
    //     return view('vehicles.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'brand' => 'required',
    //         'model' => 'required',
    //         'date' => 'required|integer',
    //         'plate' => 'required',
    //     ]);

    //     Vehicle::create([
    //         'brand' => $request->brand,
    //         'model' => $request->model,
    //         'date' => $request->date,
    //         'plate' => $request->plate,
    //     ]);

    //     dd($request->all());
    //     return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    // }

    // public function edit(Vehicle $vehicle)
    // {
    //     return view('vehicles.edit', compact('vehicle'));
    // }

    // public function update(Request $request, Vehicle $vehicle)
    // {
    //     $request->validate([
    //         'brand' => 'required',
    //         'model' => 'required',
    //         'date' => 'required|integer',
    //         'plate' => 'required',
    //     ]);

    //     $vehicle->update($request->all());

    //     return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');

    // }

    // public function destroy(Vehicle $vehicle)
    // {
    //     $vehicle->delete();

    //     return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    // }
}
