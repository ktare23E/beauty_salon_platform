<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    //

    public function index(){
        $users = User::get();
        if($users->count() > 0){
            return UserResource::collection($users);
        }else{
            return response()->json(["message" => "No record available"],200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'user_type' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                "message" => "All fields are required",
                "error" => $validator->messages()
            ],422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_type' => $request->user_type,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            "message" => "User Created",
            "data" => new UserResource($user), 
        ],200);
    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function update(Request $request, User $user){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'user_type' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if($validator->fails()){
            return response()->json([
                "message" => "All fields are required",
                "error" => $validator->messages()
            ],422);
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_type' => $request->user_type,
            'email' => $request->email,
        ]);

        return response()->json([
            "message" => "User Updated",
            "data" => new UserResource($user), 
        ],200);
    }
}
