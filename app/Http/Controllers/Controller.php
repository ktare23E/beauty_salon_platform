<?php

namespace App\Http\Controllers;

use App\Models\Business;

abstract class Controller
{
    //

    public function displayBusiness(){
        $business = Business::where('status','approved');
        return view('view',[
            'business' => $business,
        ]);
    }
}
