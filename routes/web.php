<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginStaffController;
use App\Http\Controllers\HomeLandingController;
use App\Http\Controllers\HomeControllerCustomer;
use App\Http\Controllers\TambahBarangController;
use App\Http\Controllers\LoginControllerCustomer;
use App\Http\Controllers\RegisterStaffController;
use App\Http\Controllers\TambahPesananController;
use App\Http\Controllers\RegisterControllerCustomer;
use App\Http\Controllers\KeranjangsController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomersController;

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
    Route::get('/get_customer_id', [CustomersController::class, 'getCustomerId']);
    Route::get('/show_staff/store', [StaffController::class, 'store']);
    Route::post('/riwayat_transaksi/store', [RiwayatTransaksiController::class, 'store']);
    Route::get('/keranjangs/showCart', [KeranjangsController::class, 'showCart']);
    Route::post('/keranjangs/store', [KeranjangsController::class, 'store']);
    Route::post('/keranjangs/update', [KeranjangsController::class, 'update']);
    Route::delete('/keranjangs/destroy', [KeranjangsController::class, 'destroy']);
    Route::get('/riwayat_transaksi/show', [RiwayatTransaksiController::class, 'show']);
    Route::get('/riwayat_transaksi/{id}', [RiwayatTransaksiController::class, 'showNota']);
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('tambah_barang', [TambahBarangController::class, 'index'])->name('tambah_barang');
    Route::post('/', [TambahBarangController::class, 'store'])->name('tambah_barang.store');
});

Route::prefix('staf-penjualan')->group(function () {
    Route::get('/', [DashboardController::class, 'index2'])->name('penjualan');
});


// =============LOGOUT =============

// Route Logout
Route::get('/logout', LogoutController::class)->name('logout');
