<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'date',
        'is_available',
    ];

    // 🔗 Each schedule belongs to one vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
