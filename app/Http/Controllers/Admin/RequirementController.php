<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    //
    public function index(){
        return view('admin.requirement_list');
    }
}
