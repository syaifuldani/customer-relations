<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginControllerCustomer;
use App\Http\Controllers\RegisterControllerCustomer;
use App\Http\Controllers\TambahBarangController;
use App\Http\Controllers\TambahPesananController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('register')->group(function () {
    Route::get('/', [RegisterControllerCustomer::class, 'showRegistrationForm'])->name('register');
    Route::post('/', [RegisterControllerCustomer::class, 'register']);
});

Route::get('login', [LoginControllerCustomer::class, 'index'])->name('login');


Route::prefix('staf-distribusi')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('tambah_barang', [TambahBarangController::class, 'index'])->name('tambah_barang');

});

Route::prefix('staf-penjualan')->group(function () {
    Route::get('/', [DashboardController::class, 'index2'])->name('penjualan');
});


Route::prefix('customers')->group(function () {
    Route::get('/', [TambahPesananController::class,'indexHome'])->name('home');
    Route::get('tambah_pesanan', [TambahPesananController::class, 'indexTambahPesanan'])->name('tambah_pesanan');
});