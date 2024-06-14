<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'business_name', 'address', 'contact_info', 'status', 'business_profile'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function requirementsSubmission(){
        return $this->hasMany(RequirementSubmission::class);
    }

    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }

}
