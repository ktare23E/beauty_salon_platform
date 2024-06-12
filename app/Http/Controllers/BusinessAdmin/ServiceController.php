<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\ImageService;
use App\Models\Service;

class ServiceController extends Controller
{
    //

    public function create(Business $business){
        return view('business_admin.service.create_service',[
            'business' => $business,
        ]);
    }

    public function store(Request $request, Business $business){
        
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
        ]);


        $service = $business->services()->create([
            'service_name' => $request->service_name,
            'business_id' => $business->id,
            'description' => $request->description,
        ]);


       // Check if the request contains files
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Generate a unique name for each file
                $name = time() . '_' . $file->getClientOriginalName();

                // Define the path to store the file
                $path = public_path('storage/uploads');
                
                // Ensure the directory exists
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                // Move the file to the specified directory
                $file->move($path, $name);

                // Add the file path to the array
                $filePath = 'storage/uploads/' . $name;

                // Create an entry in the ImageService table
                ImageService::create([
                    'service_id' => $service->id,
                    'path' => $filePath,
                ]);
            }
        }

        return redirect()->route('show_business',$business->id);
    }
}
