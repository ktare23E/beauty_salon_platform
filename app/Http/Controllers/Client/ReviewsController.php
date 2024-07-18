<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BusinessReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    //

    public function store(Request $request){
   
        
        $user = Auth::user();
        if(!$user){
            return response()->json(["message" => "failed"]);

        }else{
            $request->validate([
                'rate' => 'required',
                'review' => 'required',
                'business_id' => 'required'
            ]);
    
    
            $insertReview = BusinessReview::create([
                'user_id' => $user->id,
                'business_id' => $request->business_id,
                'rate' => $request->rate,
                'review' => $request->review,
                'date_review' => now()
            ]); 
    
    
        
    
            return response()->json(["message" => "success"]);
        }

    }
}
