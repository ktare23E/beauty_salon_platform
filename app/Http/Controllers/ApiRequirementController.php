<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequirementResource;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiRequirementController extends Controller
{
    //

    public function index(){
        $requirements = Requirement::get();
        if($requirements->count() > 0){
            return RequirementResource::collection($requirements);
        }else{
            return response()->json(["message" => "No record available"],200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'requirement_name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                "message" => "All fields are required",
                "error" => $validator->messages()
            ],422);
        }

        $requirement = Requirement::create([
            'requirement_name' => $request->requirement_name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json([
            "message" => "Requirement Created",
            "data" => new RequirementResource($requirement), 
        ],200);
    }

    public function show(Requirement $requirement){
        return new RequirementResource($requirement);
    }

    public function update(Request $request, Requirement $requirement){
        $validator = Validator::make($request->all(),[
            'requirement_name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                "message" => "All fields are required",
                "error" => $validator->messages()
            ],422);
        }

        $requirement->update([
            'requirement_name' => $request->requirement_name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json([
            "message" => "Requirement Updated",
            "data" => new RequirementResource($requirement), 
        ],200);
    }

    public function destroy(Requirement $requirement){
        $requirement->delete();
        return response()->json([
            "message" => "Requirement Deleted",
        ],200);
    }
}
