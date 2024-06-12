<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceVariantController extends Controller
{
    //

    public function show(Service $service){
        //retrieve all the service variant of the service
        $serviceVariants = $service->variants;
        
        return view('business_admin.service_variants.service_variant_list',[
            'service' => $service,
            'serviceVariants' => $serviceVariants,
        ]);
    }

    public function create(Service $service){
        return view('business_admin.service_variants.create_service_variant',[
            'service' => $service,
        ]);
    }

    public function store(Request $request, Service $service){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);


        $service->variants()->create([
            'name' => $request->name,
            'service_id' => $service->id,
            'description' => $request->description,
            'price' => $request->price,
            'status' => 'active',
        ]);

        return redirect()->route('service_variant_list',$service->id);

    }
}
