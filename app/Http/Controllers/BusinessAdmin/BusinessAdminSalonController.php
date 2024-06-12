<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use App\Models\Business;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;
use App\Models\User;



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

    public function store(Request $request){
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
    
        // Create the business record
        $business = Business::create($validatedBusinessData);
    
        // Validate file data
        $request->validate([
            'files.*.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'files.*.*.required' => 'At least one image file is required.',
        ]);
    
        // Iterate through the uploaded files and store them
        foreach($request->file('files') as $requirementId => $files) {
            foreach ($files as $file) {
                // Store the file
                $filePath = $file->store('uploads', 'public');
                
                // Create a requirement submission record
                RequirementSubmission::create([
                    'business_id' => $business->id,
                    'requirement_id' => $requirementId, // Add the requirement_id
                    'submission_details' => $filePath,
                    'status' => 'pending',
                ]);
            }
        }
    
        // Redirect after successful operation
        return redirect()->route('business_admin.salon');
    }

    public function show(Business $business){
        $services = $business->services;

        return view('business_admin.salon.show',[
            'business' => $business,
            'services' => $services
        ]);
    }
    
}
