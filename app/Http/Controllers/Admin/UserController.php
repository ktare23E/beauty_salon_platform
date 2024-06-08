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
        $userList = User::all();
        $user = Auth::user();
        if($user->user_type != 'admin'){
            abort('403');
        }
        return view('admin.index', compact('userList'));
    }
}
