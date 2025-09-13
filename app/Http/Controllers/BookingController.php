<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Vehicle;
use App\Services\AvailabilityService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show booking form for a vehicle
    public function create($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);
        return view('bookings.create', compact('vehicle'));
    }

    // Store booking
    public function store(Request $request, AvailabilityService $avail)
    {
        $data = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_at' => 'required|date',
            'return_at' => 'required|date|after:pickup_at',
            'total_amount' => 'required|numeric',
        ]);

        $vehicle = Vehicle::findOrFail($data['vehicle_id']);
        $from = $data['pickup_at'];
        $to = $data['return_at'];

        if (!$avail->isAvailable($vehicle->id, $from, $to)) {
            return back()->with('error', 'Vehicle is not available for these dates.');
        }

        // Create booking & schedule in transaction
        $booking = DB::transaction(function() use ($data, $vehicle) {
            $code = 'RSP' . strtoupper(Str::random(6));
            $booking = Booking::create([
                'code' => $code,
                'user_id' => Auth::id() ?? 1, // placeholder if no auth
                'vehicle_id' => $vehicle->id,
                'pickup_at' => $data['pickup_at'],
                'return_at' => $data['return_at'],
                'status' => 'confirmed',
                'total_amount' => $data['total_amount'],
            ]);

            Schedule::create([
                'vehicle_id' => $vehicle->id,
                'from_at' => $data['pickup_at'],
                'to_at' => $data['return_at'],
                'type' => 'booking'
            ]);

            return $booking;
        });

        return redirect()->route('bookings.confirm', $booking->id)
            ->with('success', 'Booking created: ' . $booking->code);
    }

    // Show booking confirmation
    public function confirm($id)
    {
        $booking = Booking::with('vehicle')->findOrFail($id);
        return view('bookings.confirm', compact('booking'));
    }
}
