<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingCancellation extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id','reason','date_cancelled'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
