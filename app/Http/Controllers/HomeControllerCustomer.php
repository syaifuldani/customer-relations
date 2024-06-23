<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControllerCustomer extends Controller
{
    public function index()
    {
        // $userData = session('userData');
        // dd($userData);
        $userId = session('userData')->customer->id_customer;
        return view('customers.tambah_pesanan', [
            'title' => 'Home',
            'nama' => session('userData')->customer->nama_customer
        ]);
    }
}
