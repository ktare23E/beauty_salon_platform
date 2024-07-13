<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'total_price', 'booking_date', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceVariants()
    {
        return $this->belongsToMany(ServiceVariant::class,'booking_service_variants')->withTimestamps();

    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'booking_packages')
                    ->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function items()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function cancellations()
    {
        return $this->hasOne(BookingCancellation::class);
    }
}
