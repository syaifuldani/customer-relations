<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Permintaans;

class StaffPenjualanController extends Controller
{
    public function index()
    {
        $totalcustomer = Customers::count();
        $product = Permintaans::with('customer')->get();
        $totalproduct = Permintaans::count();
        return view('penjualan.index', [
            'title' => 'Penjualan',
            'products' => $product,
            'totalcustomers' => $totalcustomer,
            'totalproduct' => $totalproduct
        ]);
    }
}
