<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'rating',
        'comment',
        'published',
    ];

    // 🔗 Each review belongs to a booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
