<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;

class TrucksController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'license_plate' => 'required|string|max:50|unique:trucks,license_plate',
            'company_name' => 'required|string|max:255',
            'capacity' => 'required|numeric|min:0.01',
            'current_load' => 'required|numeric|min:0.00',
            'status' => 'required|in:available,in_transit,maintenance',
            'last_service_date' => 'required|date',
        ]);

        Truck::create($data);
        return redirect()->route('trucks.index')->with('success', 'Truck created successfully.');
    }

    public function show(Truck $truck)
    {
        return view('trucks.show', compact('truck'));
    }

    public function edit(Truck $truck)
    {
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, Truck $truck)
    {
        $data = $request->validate([
            'license_plate' => 'required|string|max:50|unique:trucks,license_plate,' . $truck->id,
            'status' => 'required|in:available,in_transit,maintenance',
        ]);

        $truck->update($data);
        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully.');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('trucks.index')->with('success', 'Truck deleted successfully.');
    }
}
