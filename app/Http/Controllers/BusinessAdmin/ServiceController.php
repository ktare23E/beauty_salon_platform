<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //

    public function create(Business $business){
        return view('business_admin.service.create_service',[
            'business' => $business,
        ]);
    }
}
