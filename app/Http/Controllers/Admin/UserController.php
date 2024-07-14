<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index(){

        $businessAdmins = User::where('user_type', 'business_admin')->get();
        $clients = User::where('user_type', 'user')->get();
        $user = Auth::user();

        // return [
        //     'clients' => $clients,
        //     'businessAdmins' => $businessAdmins
        // ];
        if($user->user_type != 'admin'){
            abort('403');
        }
        return view('admin.user_list', [
            'clients' => $clients,
            'businessAdmins' => $businessAdmins
        ]);
    }
}
