<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahPesananController extends Controller
{
    public function indexTambahPesanan()
    {
        return view('customers.tambah_pesanan', [
            'title' => 'Tambah Pesanan'
        ]);
    }
}
