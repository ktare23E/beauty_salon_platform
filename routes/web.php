<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectIfAuthenticatedToDashboard;


Route::get('/', function () {
    return view('index');
})->name('dashboard');



// Route::get('/login', [LoginController::class, 'index'])->name('login');

//need to be login before can access to the user page, admin page and business_admin page
Route::middleware(['auth'])->group(function () {
    //user
    Route::get('/user', function () {
        $user = Auth::user();
        if($user->user_type != 'user'){
            abort('403');
        }
        return view('user.index');
    })->name('user.index');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/admin',[UserController::class,'index'])->name('admin.index');

    Route::get('/business_admin', function () {
        $user = Auth::user();
        if($user->user_type != 'business_admin'){
            abort('403');
        }
        return view('business_admin.index');
    })->name('business_admin.index');
});

Route::get('/register',[RegisterController::class, 'create'])->name('register.index');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::middleware([RedirectIfAuthenticatedToDashboard::class])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');
    
    // Login route
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // Register route
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
