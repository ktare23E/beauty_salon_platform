<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    //

    public function index(){
        $user = User::with('businesses')->find(Auth::id());

        return view('business_admin.sales.index',[
            'user' => $user
        ]);
    }

    public function viewSales($business){
        $user = User::with('businesses')->find(Auth::id());
        $business = $user->businesses->find($business);

        return view('business_admin.sales.view_sales',[
            'user' => $user,
            'business' => $business
        ]);
    }
}
