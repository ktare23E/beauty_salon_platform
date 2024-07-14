<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','confirmed', Password::min(6)],
            'user_type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_type' => $request->user_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'remember_token' => 
        ]);

        // Generate the token
        $token = $user->createToken('auth_token')->plainTextToken;
        // $token = $request->user()->createToken($request->token_name);


        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
