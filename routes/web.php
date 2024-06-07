<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('index');
});



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.create');

//need to be login before can access to the user page, admin page and business_admin page
Route::middleware(['auth'])->group(function () {
    Route::get('/user', function () {
        return view('user.index');
    })->name('user.index');

    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/business_admin', function () {
        return view('business_admin.index');
    })->name('business_admin.index');
});

Route::get('/register',[RegisterController::class, 'create']);
Route::post('/register',[RegisterController::class, 'store'])->name('register.create');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->name('admin.index');