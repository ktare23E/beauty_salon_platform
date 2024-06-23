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
        $businessId = $package->serviceVariants->first()->service->business_id ?? null;


        return redirect()->route('show_business', $businessId);
    }

    public function show(Package $package){
        $package->load('serviceVariants.service');

        // Return the package with its service variants and the related services

        return view('business_admin.packages.show',[
            'package' => $package,
            'service_variants' => $package->serviceVariants
        ]);
    }

    public function showPackage(Business $business){
        $business->load('services.variants');

        // Collect all variant IDs for the business's services
        $serviceVariantIds = $business->services->flatMap(function ($service) {
            return $service->variants->pluck('id');
        });

        // Fetch the packages associated with these variants
        $packages = Package::whereHas('serviceVariants', function ($query) use ($serviceVariantIds) {
            $query->whereIn('service_variant_id', $serviceVariantIds);
        })->distinct()->get();

        return view('business_admin.packages.index',[
            'business' => $business,
            'packages' => $packages
        ]);
    }
    

    public function edit(Package $package){

            $businessId = $package->serviceVariants->first()->service->business_id ?? null;


            $serviceWithServiceVariantData = Service::with('variants')->where('business_id',$businessId)->get();


            $package->load('serviceVariants.service');

            return view('business_admin.packages.edit',[
                'package' => $package,
                'package_service_variants' => $package->serviceVariants,
                'serviceWithServiceVariantData' => $serviceWithServiceVariantData
            ]);
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

        $businessId = $package->serviceVariants->first()->service->business_id ?? null;

        return redirect()->route('show_business', $businessId);
    }
}
