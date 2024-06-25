<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;

class HomeLandingController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori_barang', 'mie-gacoan'); // untuk Menyematkan nilai default dari pencarian pertama

        // dd($category);

        $products = Barangs::when($category, function ($query, $category) {
            return $query->where('kategori_barang', $category);
        })->get();

        return view('index', [
            'title' => 'Home',
            'barangs' => $products,
            'category' => $category
        ]);
    }
}
