<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', 'service_name', 'description'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // public function bookings()
    // {
    //     return $this->hasMany(Booking::class);
    // }

    public function images()
    {
        return $this->hasMany(ImageService::class);
    }

    public function variants()
    {
        return $this->hasMany(ServiceVariant::class);
    }
}
