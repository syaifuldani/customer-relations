<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffPenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan.index', [
            'title' => 'Penjualan',
        ]);
    }
}
