<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login.create');

Route::get('/register', function () {
    return view('auth.register');
})->name('login.store');
