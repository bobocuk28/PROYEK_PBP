<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/reset_password', function () {
    return view('reset_password');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
