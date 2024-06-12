<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
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
    
}
