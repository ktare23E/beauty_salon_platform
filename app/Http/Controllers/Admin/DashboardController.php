<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminFee;
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
        $requirements = Requirement::where('status','active')->limit(2)->get();
        $businessAdminCount = User::where('user_type','business_admin')->count();
        $clientCount = User::where('user_type','user')->count();
        $approvedBusinessCount = Business::where('status','approved')->count();
        $pendingBusinessCount = Business::where('status','pending')->count();
        $latestBusinessApproved = Business::where('status','approved')->orderBy('id','desc')->limit(1)->get();

        // return $latestBusinessApproved;

        return view('admin.index',[
            'requirements' => $requirements,
            'businessAdminCount' => $businessAdminCount,
            'clientCount' => $clientCount,
            'approvedBusinessCount' => $approvedBusinessCount,
            'pendingBusinessCount' => $pendingBusinessCount,
            'latestBusinessApproved' => $latestBusinessApproved
        ]);
    }

    public function adminFee(){
        $fees = AdminFee::all();

        return view('admin.fee.admin_fee',[
            'fees' => $fees
        ]);
    }

    public function create(){
        return view('admin.fee.create_fee');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'fee' => 'required|numeric',
            'status' => 'required|string'
        ]);

        $create = AdminFee::create($validated);

        return redirect()->route('admin_fee')
                ->with('success', 'Admin Fee created successfully');
    }

    public function edit(AdminFee $fee){
        return view('admin.fee.edit_fee',[
            'fee' => $fee
        ]);
    }

    public function update(AdminFee $fee, Request $request){
        $validated = $request->validate([
            'fee' => 'required|numeric',
            'status' => 'required|string'
        ]);

        $fee->update($validated);

        return redirect()->route('admin_fee')
                ->with('success', 'Admin Fee updated successfully');
    }
}
