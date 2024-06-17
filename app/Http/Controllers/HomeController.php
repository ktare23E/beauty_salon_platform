<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Service;
use App\Models\Package;

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

        // Load the services and their variants for the business
        $business->load('services.variants');

        // Collect all variant IDs for the business's services
        $serviceVariantIds = $business->services->flatMap(function ($service) {
            return $service->variants->pluck('id');
        });

        // // Fetch the packages associated with these variants
        $packages = Package::whereHas('serviceVariants', function ($query) use ($serviceVariantIds) {
            $query->whereIn('service_variant_id', $serviceVariantIds);
        })->where('status','active')->distinct()->get();
        
        $images = $business->images;
        $services = $business->services;
        
        return view('salon',[
            'business' => $business,
            'images' => $images,
            'services' => $services,
            'packages' => $packages
        ]);
    }

    public function viewService(Service $service){
        //retrieve business data from service
        $business = $service->business;
        $service_variants = $service->variants()->where('status','active')->get();
        $service_images = $service->images()->limit(4)->get();

        return view('view_service',[
            'business' => $business,
            'service' => $service,
            'service_variants' => $service_variants,
            'service_images' => $service_images
        ]);
    }

    public function viewPackage(Package $package){
        $data = Package::find($package->id);

        $package->load('serviceVariants.service');

        $send = [
            'package' => $data,
            'service_variants' => $package->serviceVariants
        ];

        if ($data) {
            return response()->json(['success' => true, 'data' => $send]);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found']);
        }
    }
}
