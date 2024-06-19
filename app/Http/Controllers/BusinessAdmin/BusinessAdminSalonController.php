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
use App\Models\Booking;

use function Pest\Laravel\json;

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
  // Validate and process request as per your application's requirements
    $validatedData = $request->validate([
        'business_name' => 'required',
        'address' => 'required',
        'contact_info' => 'required',
        'business_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Example validation for business profile
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Example validation for business images
        'files.*.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Example validation for requirement submissions
    ]);

    // Handle file uploads using the uploads disk
    if ($request->hasFile('business_profile')) {
        $businessProfile = $request->file('business_profile');
        $businessProfileName = time() . '_' . $businessProfile->getClientOriginalName();
        $businessProfile->storeAs('', $businessProfileName, 'uploads');

        // Store file path in database or perform other actions
        $businessProfilePath = 'uploads/' . $businessProfileName;
    }

    // Create business record and associate business profile if uploaded
    $business = Business::create([
        'business_name' => $validatedData['business_name'],
        'address' => $validatedData['address'],
        'contact_info' => $validatedData['contact_info'],
        'user_id' => auth()->id(),
        'status' => 'pending',
        'business_profile' => isset($businessProfilePath) ? $businessProfilePath : null,
    ]);

    // Example for business images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('', $imageName, 'uploads');

            BusinessImage::create([
                'business_id' => $business->id,
                'image_path' => 'uploads/' . $imageName,
                // Other attributes as needed
            ]);
        }
    }
            
    
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

        // Load the services and their variants for the business
        $business->load('services.variants');

        // Collect all variant IDs for the business's services
        $serviceVariantIds = $business->services->flatMap(function ($service) {
            return $service->variants->pluck('id');
        });

        // Fetch the packages associated with these variants
        $packages = Package::whereHas('serviceVariants', function ($query) use ($serviceVariantIds) {
            $query->whereIn('service_variant_id', $serviceVariantIds);
        })->distinct()->get();

         // Fetch the clients associated with the business's services
        $clients = User::whereHas('bookings.items', function ($query) use ($serviceVariantIds) {
            $query->whereHasMorph('item', ['package', 'service_variant'], function ($query) use ($serviceVariantIds) {
                $query->whereIn('id', $serviceVariantIds);
            });
        })->distinct()->get();

        // Fetch bookings associated with these service variants or packages
        $bookings = Booking::with('user')
        ->whereHas('items', function ($query) use ($serviceVariantIds) {
            $query->whereHasMorph('item', ['package', 'service_variant'], function ($query) use ($serviceVariantIds) {
                $query->whereIn('id', $serviceVariantIds);
            });
        })->distinct()->get();



        $services = $business->services;

        return view('business_admin.salon.show',[
            'business' => $business,
            'services' => $services,
            'packages' => $packages,
            'clients' => $clients,
            'bookings' => $bookings
        ]);

    }

    public function getUserTransactions($userId)
    {
        $user = User::with([
            'bookings.items.item' => function ($query) {
                $query->with('service'); // Ensure service is loaded for ServiceVariant
            },
            'bookings.items' => function ($query) {
                $query->with(['item' => function ($morphTo) {
                    $morphTo->morphWith([
                        ServiceVariant::class => ['service'],
                        Package::class => ['serviceVariants']
                    ]);
                }]);
            }
        ])->findOrFail($userId);

        //retrieve user data
        $userData = $user->only(['first_name','last_name']);


    
        return response()->json([
            'user' => $userData,
            'transactions' => $user->bookings
        ]);
    }

    public function viewBooking(Booking $booking) {
        // Eager load all necessary relationships
        $bookingData = Booking::with([
            'items.item', // Load items and their related models
            'payments'
        ])->findOrFail($booking->id);
    
    
        // Load relationships dynamically based on item_type
        foreach ($bookingData->items as $item) {
            if ($item->item_type === 'service_variant') {
                $item->item->load('service');
            } elseif ($item->item_type === 'package') {
                $item->item->load('serviceVariants');
            } else {
                // Handle unexpected item_type if needed
            }
        }

        $userData = User::findOrFail($bookingData->user_id);
        
    
        // Return the booking data with all related information
        return response()->json([
            'booking' => $bookingData,
            'user' => $userData,
        ]);
    }
    
}
