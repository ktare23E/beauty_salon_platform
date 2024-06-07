<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validatedData)){

            //check user type and redirect accordingly
            if(Auth::user()->user_type == 'user'){
                return redirect()->route('user.index');
            }elseif(Auth::user()->user_type == 'business_admin'){
                return redirect()->route('business_admin.index');
            }elseif(Auth::user()->user_type == 'admin'){
                return redirect()->route('admin.index');
            }        
        }

        return back()->with('status', 'Invalid login details');
    }


    public function destroy(){
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
