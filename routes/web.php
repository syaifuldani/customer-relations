<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StaffDistribusiController;
use App\Http\Controllers\LoginStaffController;
use App\Http\Controllers\HomeLandingController;
use App\Http\Controllers\HomeControllerCustomer;
use App\Http\Controllers\TambahBarangController;
use App\Http\Controllers\LoginControllerCustomer;
use App\Http\Controllers\RegisterStaffController;
// use App\Http\Controllers\TambahPesananController;
use App\Http\Controllers\RegisterControllerCustomer;
use App\Http\Controllers\StaffPenjualanController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PermintaansController;
use App\Http\Controllers\RiwayatTransaksiController;

Route::get('/', [HomeLandingController::class, 'index'])->name('home_landing');

// Register Customer
Route::prefix('register')->group(function () {
    Route::get('/', [RegisterControllerCustomer::class, 'create'])->name('register');
    Route::post('/add', [RegisterControllerCustomer::class, 'store'])->name('register.add');
});

// Login Customer
Route::prefix('login')->group(function () {
    Route::get('/', [LoginControllerCustomer::class, 'create'])->name('logincustomer');
    Route::post('/auth', [LoginControllerCustomer::class, 'authentication'])->name('login.authentication');
});

// =======================HOME USER SETELAH LOGIN====================================================

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeControllerCustomer::class, 'index'])->name('home');
    // Route::get('/get_customer_id', [CustomersController::class, 'getCustomerId']);
    // Route::get('/show_staff/store', [StaffController::class, 'store']);
    // Route::post('/riwayat_transaksi/store', [RiwayatTransaksiController::class, 'store']);
    // Route::get('/permintaan', [PermintaansController::class, 'index'])->name('permintaan');
    Route::post('/permintaan/store', [PermintaansController::class, 'store'])->name('permintaan.store');
    // Route::post('/keranjangs/update', [PermintaansController::class, 'update']);
    // Route::delete('/keranjangs/destroy', [PermintaansController::class, 'destroy']);
    // Route::get('/riwayat_transaksi/show', [RiwayatTransaksiController::class, 'show']);
    // Route::get('/riwayat_transaksi/{id}', [RiwayatTransaksiController::class, 'showNota']);
});


// Route::get('tambah_pesanan', [TambahPesananController::class, 'indexTambahPesanan'])->name('pesan');


// ============================STAFF=====================================
Route::prefix('staff')->group(function () {
    Route::get('/login', [LoginStaffController::class, 'index'])->name('loginstaff');
    Route::post('/auth', [LoginStaffController::class, 'authentication'])->name('loginstaff.authentication');
});

Route::prefix('daftarstaff')->group(function () {
    Route::get('/', [RegisterStaffController::class, 'index'])->name('daftarstaff');
    Route::post('/daftar', [RegisterStaffController::class, 'store'])->name('register.daftar');
});

Route::prefix('staf-distribusi')->group(function () {
    Route::get('/', [StaffDistribusiController::class, 'index'])->name('dashboardDistribusi');
    Route::get('tambah_barang', [TambahBarangController::class, 'index'])->name('tambah_barang');
    Route::post('/', [TambahBarangController::class, 'store'])->name('tambah_barang.store');
    Route::get('products/{id}/edit', [StaffDistribusiController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [StaffDistribusiController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [StaffDistribusiController::class, 'destroy'])->name('products.delete');
});

Route::prefix('staf-penjualan')->group(function () {
    Route::get('/', [StaffPenjualanController::class, 'index'])->name('dashboardPenjualan');
    Route::get('permintaan', [PermintaansController::class, 'index'])->name('penjualan.permintaan');
});


// =============LOGOUT =============

// Route Logout
Route::get('/logout', LogoutController::class)->name('logout');
