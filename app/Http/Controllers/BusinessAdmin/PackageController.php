<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function create(Business $business) {
        // Eager load services with their active variants
        $services = $business->services()->with(['variants' => function ($query) {
            $query->where('status', 'active');
        }])->get();
    
        // At this point, $services contains all services and each service contains only its active variants
        // return $services->service_name;
        // foreach($services as $service){
        //     echo $service->service_name.'<br>';
        //     foreach($service->variants as $variant){
        //         echo $variant->name.'<br>';
        //     }
        // }

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
    
}
