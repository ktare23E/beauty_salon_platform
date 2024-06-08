<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        if($user->user_type != 'admin'){
            abort('403');
        }
        return view('admin.index');
    }
}
