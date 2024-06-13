<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\ServiceVariant;
use App\Models\Service;

class PackageController extends Controller
{

    public function create(Business $business) {
        // Eager load services with their active variants
        $services = $business->services()->with(['variants' => function ($query) {
            $query->where('status', 'active');
        }])->get();
    

        return view('business_admin.packages.create', compact('services'));
    }

    public function store(Request $request){

        $selectedVariantsId = [];

        foreach ($request->all() as $key => $value) {
            // Check if the key starts with 'variant_'
            if (strpos($key, 'service_variant_') === 0) {
                // Extract the service ID from the key
                $serviceId = str_replace('service_variant_', '', $key);
                $variantId = $value;
    
                // Store the selected variant in the array
                $selectedVariantsId[] = $variantId;
            }
        }
        
        $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $package = Package::create([
            'package_name' => $request->package_name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => 'active',
        ]);

        $package->serviceVariants()->attach($selectedVariantsId);

        // return redirect()->route('show_business', $request->business_id);
    }

    public function show(Package $package){
        $package->load('serviceVariants.service');

        // Return the package with its service variants and the related services

        return view('business_admin.packages.show',[
            'package' => $package,
            'service_variants' => $package->serviceVariants
        ]);
    }
    

    public function edit(Package $package){
           // Load the service variants and the related services for the given package
            // $package->load('serviceVariants.service');

            // // Fetch all service variant IDs associated with the package
            // $selectedServiceVariantIds = $package->serviceVariants->pluck('id');

            // // Fetch the business_id from the first service associated with the package
            // $businessId = $package->serviceVariants->first()->service->business_id ?? null;

            // // Ensure business_id is valid
            // if (!$businessId) {
            //     return response()->json(['error' => 'Business ID not found.'], 404);
            // }

            // // Fetch all services belonging to the specific business
            // $allServices = Service::where('business_id', $businessId)
            //     ->with(['variants' => function($query) use ($selectedServiceVariantIds) {
            //         $query->whereNotIn('id', $selectedServiceVariantIds);
            //     }])
            //     ->get();

            // // Filter services that have no variants or only unselected variants
            // $unselectedServices = $allServices->filter(function ($service) use ($selectedServiceVariantIds) {
            //     return $service->variants->isEmpty() || $service->variants->pluck('id')->intersect($selectedServiceVariantIds)->isEmpty();
            // });

            $businessId = $package->serviceVariants->first()->service->business_id ?? null;


            $serviceWithServiceVariantData = Service::with('variants')->where('business_id',$businessId)->get();
            // return $serviceWithServiceVariantData;

            $package->load('serviceVariants.service');
            // $service_variant_id = [];
            // foreach($package->serviceVariants as $serviceVariant){
            //     $service_variant_id[] = $serviceVariant->id;
            // }

            // return $service_variant_id;
            // Return the package with its service variants and the related services

            //display all the service_variant_id from this 
            // $package->serviceVariants;

            return view('business_admin.packages.edit',[
                'package' => $package,
                'package_service_variants' => $package->serviceVariants,
                'serviceWithServiceVariantData' => $serviceWithServiceVariantData
            ]);

            // // Return data to view or as JSON response
            // return response()->json([
            //     'package' => $package,
            //     'unselected_services' => $unselectedServices->values()
            // ]);
    }

    public function update(Request $request, Package $package){
        $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $package->update([
            'package_name' => $request->package_name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $package->serviceVariants()->detach();

        $selectedVariantsId = [];

        foreach ($request->all() as $key => $value) {
            // Check if the key starts with 'variant_'
            if (strpos($key, 'service_variant_') === 0) {
                // Extract the service ID from the key
                $serviceId = str_replace('service_variant_', '', $key);
                $variantId = $value;
    
                // Store the selected variant in the array
                $selectedVariantsId[] = $variantId;
            }
        }

        $package->serviceVariants()->attach($selectedVariantsId);

        // return redirect()->route('show_business', $request->business_id);
    }
}
