<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', 'requirement_id', 'submission_details', 'status',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
