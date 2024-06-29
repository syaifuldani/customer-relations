<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;

class HomeControllerCustomer extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori_barang', 'mie-gacoan'); // Mendapatkan nilai kategori dari request, dengan nilai default 'mie-gacoan' jika tidak ada
        $products = Barangs::where('kategori_barang', $category)
            ->where('stok_barang', '>', 0)
            ->get();


        $userId = session('userData')->customer->id_customer;
        return view('customers.tambah_pesanan', [
            'title' => 'Home',
            'nama' => session('userData')->customer->nama_customer,
            'barangs' => $products,
            'category' => $category
        ]);


        // dd($category);
    }
}
