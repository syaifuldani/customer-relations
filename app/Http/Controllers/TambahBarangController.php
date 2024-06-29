<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TambahBarangController extends Controller
{
    public function index()
    {
        return view('distribusi.tambah_barang', [
            'title' => 'Tambah Barang'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'foto_barang' => 'required|image|mimes:jpeg,jpg,png',
            'kategori_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
        ]);

        $image = $request->file('foto_barang');
        $image->storeAs('public/products', $image->hashName());

        $addBarang = Barangs::Create([
            'staff_id' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'foto_barang' => $image->hashName(),
            'kategori_barang' => $request->kategori_barang,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang
        ]);

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        //get product by ID
        $product = Barangs::findOrFail($id);

        //render view with product
        return view('products.edit', compact('product'));
    }
}
