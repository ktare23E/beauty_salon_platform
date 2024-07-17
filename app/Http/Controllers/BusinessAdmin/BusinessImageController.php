<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessImage;
use Illuminate\Http\Request;

class BusinessImageController extends Controller
{
    public function index(Business $business){
        $images = BusinessImage::where('business_id', $business->id)->get();

        return view('business_admin.salon_images.index',[
            "business" => $business,
            "images" => $images
        ]);
    }
}
