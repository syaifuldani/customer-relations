<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;

class HomeControllerCustomer extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori_barang', 'mie-gacoan'); // untuk Menyematkan nilai default dari pencarian pertama
        $products = Barangs::when($category, function ($query, $category) {
            return $query->where('kategori_barang', $category);
        })->get();

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
