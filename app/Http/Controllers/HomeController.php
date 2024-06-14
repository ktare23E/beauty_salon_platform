<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class HomeController extends Controller
{
    //

    public function displayBusiness(){
        $salons = Business::where('status','approved')->get();
        return view('view',[
            'salons' => $salons
        ]);
    }
}
