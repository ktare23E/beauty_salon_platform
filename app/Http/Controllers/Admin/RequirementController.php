<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    //
    public function index(){
        $requirements = Requirement::where('status','active')->get();
        return view('admin.requirement.requirement_list',compact('requirements'));
    }

    public function create(){
        return view('admin.requirement.create_requirement');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'requirement_name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Requirement::create($validatedData);

        return redirect()->route('admin.requirement_list')
                        ->with('success', 'Requirement created successfully');
    }

    public function edit(Requirement $requirement){
        $requirement = Requirement::findOrFail($requirement->id);

        return view('admin.requirement.edit_requirement', compact('requirement'));

    }

    public function update(Request $request, Requirement $requirement){
        $validateData = $request->validate([
            'requirement_name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Requirement::where('id',$requirement->id)->update($validateData);

        return redirect()->route('admin.requirement_list');
    }
}
