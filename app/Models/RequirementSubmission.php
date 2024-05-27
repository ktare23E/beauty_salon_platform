<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'requirement_id', 'submission_details', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
