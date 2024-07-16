<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;

class BusinessRequirementSubmissionController extends Controller
{
    //

    public function index(Business $business){
        $requirement_submissions = $business->requirementsSubmission;
        return $requirement_submissions;
        return view('business_admin.requirement_submission.index',[
            "business" => $business,
            "requirement_submissions" => $requirement_submissions 
        ]);
    }
}
