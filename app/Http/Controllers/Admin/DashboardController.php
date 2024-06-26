<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        if($user->user_type != 'admin'){
            abort('403');
        }
        $requirements = Requirement::where('status','active')->get();
        $businessAdminCount = User::where('user_type','business_admin')->count();
        $clientCount = User::where('user_type','user')->count();
        $approvedBusinessCount = Business::where('status','approved')->count();
        $pendingBusinessCount = Business::where('status','pending')->count();
        $latestBusinessApproved = Business::where('status','approved')->orderBy('id','desc')->limit(1)->get();

        return view('admin.index',[
            'requirements' => $requirements,
            'businessAdminCount' => $businessAdminCount,
            'clientCount' => $clientCount,
            'approvedBusinessCount' => $approvedBusinessCount,
            'pendingBusinessCount' => $pendingBusinessCount,
            'latestBusinessApproved' => $latestBusinessApproved
        ]);
    }
}
