<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BusinessRequirementSubmissionController extends Controller
{
    //

    public function index(Business $business){
        $requirement_submissions = RequirementSubmission::with("requirement")->where('business_id',$business->id)->get(); 

        return view('business_admin.requirement_submission.index',[
            "business" => $business,
            "requirement_submissions" => $requirement_submissions 
        ]);
    }

    public function updateRequirementSubmission(Request $request,$id){
        //  Validate the request
        $request->validate([
            'submission_details' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the existing record
        $requirement = RequirementSubmission::find($id);

        if ($requirement) {
            // Store the new image
            $imagePath = $request->file('submission_details')->store('requirements', 'public');

            // Delete the old image if it exists
            if ($requirement->submission_details) {
                Storage::disk('public')->delete($requirement->submission_details);
            }

            // Update the database with the new image path
            $requirement->submission_details = $imagePath;
            $requirement->save();

            return response()->json(['message' => 'success']);
        }

        return response()->json(['error' => 'Requirement not found'], 404);
        }
}
