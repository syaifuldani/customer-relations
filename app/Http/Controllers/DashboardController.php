<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil ID staff yang sedang login dari session
        $staffId = session('userData')->staff->staff_id;

        // Mengambil data barang
        $products = Barangs::all();

        // Mengirim data ke view
        return view('distribusi.index', [
            'title' => 'Beranda Distribusi',
            'nama' => session('userData')->staff->nama_staff,
            'products' => $products // Mengubah 'barangs' menjadi 'products' agar sesuai dengan view
        ]);
    }
}
