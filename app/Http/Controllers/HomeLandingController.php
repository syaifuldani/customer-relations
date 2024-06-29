<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;

class HomeLandingController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori_barang', 'mie-gacoan'); // Mendapatkan nilai kategori dari request, dengan nilai default 'mie-gacoan' jika tidak ada
        $products = Barangs::where('kategori_barang', $category)
            ->where('stok_barang', '>', 0)
            ->get();

        return view('index', [
            'title' => 'Home',
            'barangs' => $products,
            'category' => $category
        ]);
    }
}
