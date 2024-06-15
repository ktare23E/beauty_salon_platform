<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Service;

class HomeController extends Controller
{
    //

    public function displayBusiness(){
        $salons = Business::where('status','approved')->get();
        return view('view',[
            'salons' => $salons
        ]);
    }

    public function viewSalon(Business $business){
        $images = $business->images;
        $services = $business->services;
        
        return view('salon',[
            'business' => $business,
            'images' => $images,
            'services' => $services
        ]);
    }

    public function viewService(Service $service){
        //retrieve business data from service
        $business = $service->business;
        $service_variants = $service->variants;
        $service_images = $service->images()->limit(4)->get();

        return view('view_service',[
            'business' => $business,
            'service' => $service,
            'service_variants' => $service_variants,
            'service_images' => $service_images
        ]);
    }
}
