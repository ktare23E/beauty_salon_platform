<?php

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
        return view('user.index');
    })->name('user.index');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/business_admin', function () {
        return view('business_admin.index');
    })->name('business_admin.index');
});

Route::get('/register',[RegisterController::class, 'create'])->name('register.index');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::middleware([RedirectIfAuthenticatedToDashboard::class])->group(function () {
    // Login route
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // Register route
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

// Route::get('/admin', function () {
//     return view('admin.index');
// })->name('admin.index');