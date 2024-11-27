<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('login', [LoginController::class, 'login']);

