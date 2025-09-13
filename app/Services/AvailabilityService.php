<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class AvailabilityService
{
    /**
     * Check if a vehicle is available between $from and $to
     *
     * @param int $vehicleId
     * @param string $from  // start datetime
     * @param string $to    // end datetime
     * @return bool
     */
    public function isAvailable(int $vehicleId, string $from, string $to): bool
    {
        return DB::transaction(function() use ($vehicleId, $from, $to) {
            // Lock relevant rows to prevent race conditions
            $overlap = Schedule::where('vehicle_id', $vehicleId)
                ->where(function($q) use ($from, $to) {
                    $q->whereBetween('from_at', [$from, $to])
                      ->orWhereBetween('to_at', [$from, $to])
                      ->orWhereRaw('? BETWEEN from_at AND to_at', [$from])
                      ->orWhereRaw('? BETWEEN from_at AND to_at', [$to]);
                })
                ->lockForUpdate()
                ->exists();

            return !$overlap;
        });
    }
}
