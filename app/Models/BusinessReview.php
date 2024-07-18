<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BusinessReview extends Model
{
    use HasFactory;
    protected $fillable = ['business_id','user_id','rate','review','date_review'];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateReviewEntityAttribute()
    {   
        return Carbon::parse($this->date_review)->format('d M Y');
    }
}
