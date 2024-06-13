<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageServiceVariant extends Model
{
    use HasFactory;
    protected $table = 'package_service_variants';
    protected $fillable = [
        'package_id',
        'service_variant_id',
    ];
}
