<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginControllerCustomer;
use App\Http\Controllers\RegisterControllerCustomer;

Route::get('/', function () {
    return view('index');
});

Route::prefix('customer')->group(function () {
    // Route::get('menu', [])
});

Route::get('login', [LoginControllerCustomer::class, 'index'])->name('login');
Route::get('register', [RegisterControllerCustomer::class, 'index'])->name('register');

Route::prefix('staf-distribusi')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('staf-penjualan')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
