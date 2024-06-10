<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;
use App\Models\Business;

class RequirementSubmissionController extends Controller
{
    //

    public function show($id){
        $data = RequirementSubmission::find($id); // Retrieve the data by ID
        $requirement = $data->requirement;
        $send = [
            'requirement' => $requirement,
            'submission' => $data
        ];
        if ($data) {
            return response()->json(['success' => true, 'data' => $send]);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found']);
        }
    }

    public function update(RequirementSubmission $requirement_submission,Request $request){
     // Step 1: Update the status of the RequirementSubmission to "approve"
        $requirement_submission->update([
            'status' => $request->status
        ]);

        // Step 2: Get the business_id from the requirement_submission
        $business_id = $requirement_submission->business_id;

        // Step 3: Check if all requirements for the given business_id are approved
        $pendingSubmissions = RequirementSubmission::where('business_id', $business_id)
                                                ->where('status', 'pending')
                                                ->count();

        // Step 4: Update the status of the Business to "approve" if there are no pending submissions
        if ($pendingSubmissions == 0) {
            $business = Business::find($business_id);
            $business->update([
                'status' => 'approved'
            ]);

            return redirect()->route('admin.salon_list');
        }

        return redirect()->route('admin.show_salon',$business_id);
    }
}
