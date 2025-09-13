<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Show all available vehicles
    public function index()
    {
        $vehicles = Vehicle::where('status', 'available')->paginate(8);
        return view('vehicles.index', compact('vehicles'));
    }

    // Show details of a single vehicle
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }
}
