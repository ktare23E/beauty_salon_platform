<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'requirement_name', 'description', 'status',
    ];

    public function submissions()
    {
        return $this->hasMany(RequirementSubmission::class);
    }
}
