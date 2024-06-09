<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\User;

class SalonController extends Controller
{
    //
    public function index(){
    

        $pendingSalon = Business::with('user')->where('status','pending')->get();
        $approvedSalon = Business::with('user')->where('status','approved')->get();

        return view('admin.salon.salon_list',[
            'pendingSalon' => $pendingSalon,
            'approvedSalon' => $approvedSalon
        ]);
    }

    public function show(Business $business){
        // $business = Business::with('user')->find($business->id);

        return view('admin.salon.show',[
            'business' => $business
        ]);
    }
}
