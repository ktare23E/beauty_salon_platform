<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
