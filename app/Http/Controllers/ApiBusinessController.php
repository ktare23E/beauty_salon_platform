<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessResource;
use App\Models\Business;
use Illuminate\Http\Request;

class ApiBusinessController extends Controller
{
    //

    public function index(){
        $business = Business::get();
        if($business->count() > 0){
            return BusinessResource::collection($business);
        }else{
            return response()->json(["message" => "No record available"],200);
        }    }
}