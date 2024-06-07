<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    //

    public function create(){
        return view('auth.register');
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','confirmed', Password::min(6)],
            'user_type' => 'required'
        ]);
    
        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->user_type = $validatedData['user_type'];
        $user->save();
    
        Auth::login($user);
    
        // Check the user type and redirect accordingly
        if ($user->user_type == 'user') {
            return redirect()->route('user.index');
        } elseif ($user->user_type == 'business_admin') {
            return redirect()->route('business_admin.index');
        }
    }
}
