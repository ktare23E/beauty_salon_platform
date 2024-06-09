<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequirementSubmission;
use Illuminate\Http\Request;

class RequirementSubmissionController extends Controller
{
    //

    public function show($id){
        $data = RequirementSubmission::find($id); // Retrieve the data by ID

        if ($data) {
            return response()->json(['success' => true, 'data' => $data]);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found']);
        }
    }
}
