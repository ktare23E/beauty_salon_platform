<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;



class SalonController extends Controller
{
    //
    public function index(){
    

        $pendingSalon = Business::with('user')->where('status','pending')->get();
        $approvedSalon = Business::with('user')->where('status','approved')->get();

        return [
            'pendingSalon' => $pendingSalon,
            'approvedSalon' => $approvedSalon
        ];

        return view('admin.salon.salon_list',[
            'pendingSalon' => $pendingSalon,
            'approvedSalon' => $approvedSalon
        ]);
    }

    public function show(Business $business){

        $business = Business::findOrFail($business->id);
        $requirements = $business->requirementsSubmission()->whereNot('status','approved')->get();



        return view('admin.salon.show',[
            'business' => $business,
            'requirements' => $requirements
        ]);
    }

 
}

