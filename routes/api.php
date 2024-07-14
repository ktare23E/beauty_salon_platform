<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\ApiBusinessController;
use App\Http\Controllers\ApiRequirementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ApiUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/test',function(Request $request){
//     return "Hello World!";
// });

// Route::get('/requirement_list',[RequirementController::class,'index'])->middleware('auth:sanctum');
// Route::post('/create_requirement',[RequirementController::class,'store'])->name('admin.store_requirement');

// Route::post('/login', [LoginController::class, 'store'])->name('login.store');
// Route::get('/user_list',[UserController::class,'index'])->name('admin.user_list');
// Route::get('/salon_list',[SalonController::class,'index'])->name('admin.salon_list');
// Route::post('register', [RegisterController::class, 'register']);

Route::apiResource('requirements', ApiRequirementController::class);
Route::apiResource('business', ApiBusinessController::class);
Route::apiResource('users', ApiUserController::class);