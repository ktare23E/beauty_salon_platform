<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Mail\ApprovedBusinessSalonMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Requirement;
use App\Mail\DeclinedRequirementSubmission;

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

    public function update(Request $request,$id){

        $requirement_submission = RequirementSubmission::findOrFail($id);

     // Step 1: Update the status of the RequirementSubmission to "approve"
        $update = $requirement_submission->update([
            'status' => $request->status
        ]);

        $requirement = Requirement::findOrFail($requirement_submission->requirement_id);

        // Step 2: Get the business_id from the requirement_submission
        $business_id = $requirement_submission->business_id;
        $business = Business::with('user')->find($business_id);

        if($request->status === 'declined'){
              // Send an email to the admin
            $details = [
                'title' => 'Requirement Submission Notification',
                'body' => 'Your '.$requirement->requirement_name.' requirement submission is invalid please resubmit a valid one.',
            ];
    
            Mail::to($business->user->email)->queue(new DeclinedRequirementSubmission($details));  
            return response()->json(['message' => 'declined']);
     
        }


        // Step 3: Check if all requirements for the given business_id are approved
        $pendingSubmissions = RequirementSubmission::where('business_id', $business_id)
                                                ->where('status', 'pending')
                                                ->count();

        // Step 4: Update the status of the Business to "approve" if there are no pending submissions
        if ($pendingSubmissions == 0) {
            $business->update([
                'status' => 'approved'
            ]);

             // Send an email to the admin
            $details = [
                'title' => 'Approved Business Salon',
                'body' => 'Your business salon has now been approved you can now operate your salon.',
            ];
    
            Mail::to($business->user->email)->queue(new ApprovedBusinessSalonMail($details));        


            return redirect()->route('admin.salon_list');
        }

        return redirect()->route('admin.show_salon',$business_id);
    }
}
