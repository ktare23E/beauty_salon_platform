<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'price',
        'description',
        'status',
    ];

    public function serviceVariants()
    {
        return $this->belongsToMany(ServiceVariant::class, 'package_service_variants')->withTimestamps();
    }

    public function services()
    {
        return $this->hasManyThrough(Service::class, ServiceVariant::class);
    }
}
