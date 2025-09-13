<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_no',
        'make',
        'model',
        'year',
        'type',
        'seats',
        'transmission',
        'daily_rate',
        'status',
        'image_path',
    ];

    // 🔗 Vehicle has many schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    // 🔗 Vehicle has many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
