<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessImageController extends Controller
{
    public function index(Business $business){
        $images = BusinessImage::where('business_id', $business->id)->get();

        return view('business_admin.salon_images.index',[
            "business" => $business,
            "images" => $images
        ]);
    }

    public function updateBusinessImage(Request $request,$id){
        //  Validate the request
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        // Find the existing record
        $business_image = BusinessImage::findOrFail($id);


        if ($business_image) {
            // Store the new image
            $imagePath = $request->file('image_path')->store('requirements', 'public');

            // Delete the old image if it exists
            if ($business_image->image_path) {
                Storage::disk('public')->delete($business_image->image_path);
            }

            // Update the database with the new image path
            $business_image->image_path = $imagePath;
            $business_image->save();      

            return response()->json(['message' => 'success']);
        }

        return response()->json(['error' => 'Requirement not found'], 404);
        }
}
