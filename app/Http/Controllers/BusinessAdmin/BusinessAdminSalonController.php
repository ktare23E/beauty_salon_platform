<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use App\Models\Business;
use App\Models\Package;
use App\Models\PackageServiceVariant;
use App\Models\RequirementSubmission;
use App\Models\Service;
use App\Models\ServiceVariant;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BusinessImage;



class BusinessAdminSalonController extends Controller
{
    //

    public function index(){
        $userWithBusinesses = User::with('businesses')->find(auth()->user()->id);
        

        return view('business_admin.salon.index',[
            'userWithBusinesses' => $userWithBusinesses,
        ]);
    }


    public function create(){
        $requirements = Requirement::where('status','active')->get();
        return view('business_admin.salon.create_salon',[
            'requirements' => $requirements
        ]);
    }


    public function store(Request $request) {
        $user = auth()->user();
    
        // Validate business data
        $validatedBusinessData = $request->validate([
            'business_name' => 'required',
            'address' => 'required',
            'contact_info' => 'required',
        ]);
    
        // Add additional fields to business data
        $validatedBusinessData['user_id'] = $user->id;
        $validatedBusinessData['status'] = 'pending';
    
        // Handle business profile upload
        if ($request->hasFile('business_profile')) {
            $profilePath = $request->file('business_profile')->store('uploads', 'uploads');
            $validatedBusinessData['business_profile'] = $profilePath;
        }
    
        // Create the business record
        $business = Business::create($validatedBusinessData);
    
        // Validate images data
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'files.*.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'files.*.*.required' => 'At least one image file is required.',
        ]);
    
        // Store business images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/uploads'), $imageName);
        
                BusinessImage::create([
                    'business_id' => $business->id,
                    'image_path' => 'uploads/' . $imageName,
                ]);
            }
        }
    
        // Iterate through the uploaded files and store them
        foreach ($request->file('files') as $requirementId => $files) {
            foreach ($files as $file) {
                $filePath = $file->store('uploads', 'uploads');
        
                RequirementSubmission::create([
                    'business_id' => $business->id,
                    'requirement_id' => $requirementId,
                    'submission_details' => $filePath,
                    'status' => 'pending',
                ]);
            }
        }

        // Redirect after successful operation
        return redirect()->route('business_admin.salon');
    }
    
    

    public function show(Business $business){

        // Load the services and their variants for the business
        $business->load('services.variants');

        // Collect all variant IDs for the business's services
        $serviceVariantIds = $business->services->flatMap(function ($service) {
            return $service->variants->pluck('id');
        });

        // // Fetch the packages associated with these variants
        $packages = Package::whereHas('serviceVariants', function ($query) use ($serviceVariantIds) {
            $query->whereIn('service_variant_id', $serviceVariantIds);
        })->distinct()->get();

        $services = $business->services;
 

        return view('business_admin.salon.show',[
            'business' => $business,
            'services' => $services,
            'packages' => $packages
        ]);

        // $services = Service::where('business_id',$business->id)->get();
        // $service_id = [];
        // foreach($services as $service){
        //     $service_id[] = $service->id;
        // }

        // $ServiceVariants = ServiceVariant::whereIn('service_id',$service_id)->get();
        // $service_variant_id = [];

        // foreach($ServiceVariants as $variant){
        //     $service_variant_id[] = $variant->id;
        // }

        // $packageServices = PackageServiceVariant::whereIn('service_variant_id',$service_variant_id)->get();

        // $package_id = [];

        // foreach($packageServices as $packServces){
        //     $package_id[] = $packServces->package_id;
        // }

        // $packageData = Package::whereIn('id',$package_id)->get();
        // return $packageData;
        // return view('business_admin.salon.show', [
        //     'business' => $business,
        //     'services' => $business->services,
        //     'packageServiceVariants' => $packageServiceVariants,
        // ]);

    }
    
}
