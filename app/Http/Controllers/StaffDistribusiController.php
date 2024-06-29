<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StaffDistribusiController extends Controller
{
    public function index()
    {
        // Mengambil ID staff yang sedang login dari session
        $staffId = session('userData')->staff->staff_id;

        // Mengambil data barang
        // $products = Barangs::where('stok_barang', '>', 0)->get();
        $products = Barangs::all();

        // Mengirim data ke view
        return view('distribusi.index', [
            'title' => 'Beranda Distribusi',
            'nama' => session('userData')->staff->nama_staff,
            'products' => $products // Mengubah 'barangs' menjadi 'products' agar sesuai dengan view
        ]);
    }

    // app/Http/Controllers/ProductController.php

    public function edit($id)
    {
        // Get product by ID
        $product = Barangs::findOrFail($id);

        // Render view with product
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar_makanan' => 'image|mimes:jpeg,jpg,png',
            'nama_makanan' => 'required|min:5',
            'kategori_barang' => 'required',
            'harga_makanan' => 'required|numeric',
            'stok_makanan' => 'required|numeric'
        ]);

        $product = Barangs::findOrFail($id);

        // Handle image upload if a new image is provided
        if ($request->hasFile('gambar_makanan')) {
            $image = $request->file('gambar_makanan');
            $image->storeAs('public/products', $image->hashName());

            // Delete old image
            Storage::delete('public/products/' . $product->foto_barang);

            $product->update([
                'nama_barang' => $request->nama_makanan,
                'foto_barang' => $image->hashName(),
                'kategori_barang' => $request->kategori_barang,
                'harga_barang' => $request->harga_makanan,
                'stok_barang' => $request->stok_makanan
            ]);
        } else {
            // Update without changing the image
            $product->update([
                'nama_barang' => $request->nama_makanan,
                'kategori_barang' => $request->kategori_barang,
                'harga_barang' => $request->harga_makanan,
                'stok_barang' => $request->stok_makanan
            ]);
        }

        return redirect()->route('dashboardDistribusi')->with('success', 'Data Berhasil Diubah!');
    }


    public function destroy($id)
    {
        $product = Barangs::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboardDistribusi')->with('success', 'Produk berhasil dihapus!');
    }
}
