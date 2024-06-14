<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class   DashboardController extends Controller
{
    public function index()
    {
        return view('distribusi.index', [
            'title' => 'Beranda Distribusi',
        ]);
    }

    public function index2()
    {
        return view('penjualan.index', [
            'title' => 'Beranda Penjualan',
        ]);
    }
}
