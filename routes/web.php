<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginStaffController;
use App\Http\Controllers\LoginControllerCustomer;
use App\Http\Controllers\RegisterStaffController;
use App\Http\Controllers\RegisterControllerCustomer;

Route::get('/', function () {
    return view('index');
});

// Login Customer
Route::prefix('login')->group(function () {
    Route::get('/', [LoginControllerCustomer::class, 'create'])->name('login');
    Route::post('/auth', [LoginControllerCustomer::class, 'authentication'])->name('login.authentication');
});

// Register Customer
Route::prefix('register')->group(function () {
    Route::get('/', [RegisterControllerCustomer::class, 'create'])->name('register');
    Route::post('/add', [RegisterControllerCustomer::class, 'store'])->name('register.add');
});


Route::prefix('menu')->group(function () {
    Route::get('miegacoan');
});

// =================================================================
Route::prefix('staff')->group(function () {
    Route::get('login', [LoginStaffController::class, 'index'])->name('login');
});

Route::prefix('daftarstaff')->group(function () {
    Route::get('/', [RegisterStaffController::class, 'index'])->name('daftarstaff');
    Route::post('/daftar', [RegisterStaffController::class, 'store'])->name('register.daftar');
});


Route::prefix('staf-distribusi')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('staf-penjualan')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index2'])->name('dashboard');
});
