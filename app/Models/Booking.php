<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    // 🔗 A booking belongs to a customer
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 A booking belongs to a vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // 🔗 A booking can have one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
