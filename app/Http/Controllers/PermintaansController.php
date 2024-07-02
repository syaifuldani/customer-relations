<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Barangs;
use App\Models\Customers;
use App\Models\Permintaans;
use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermintaansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Customers::all();
        return view('penjualan.konfirmasi-pembelian', [
            'title' => 'Permintaans',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_barang' => 'required',
            'kuantitas' => 'required',
            'alamat' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        $customer_id = Auth::id();

        // Debug: Check customer ID and validated data

        // dd($request);

        // Create the permintaan record
        $permintaan = Permintaans::create([
            'customer_id' => Auth::id(),
            'nama_barang' => $request->input('nama_barang'),
            'kuantitas' => $request->input('kuantitas'),
            'alamat' => $request->input('alamat'),
            'jenis_pembayaran' => $request->input('jenis_pembayaran'),
            'harga_barang' => $request->input('harga_barang', null),
        ]);

        // Redirect with success message
        return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
    }



    public function saveOrder(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showCart()
    {
        $user = Auth::user();
        $customer = $user->customer;

        if ($customer) {
            $keranjangItems = Permintaans::where('customer_id', $customer->id_customer)
                ->with('barang')
                ->get();

            return response()->json($keranjangItems);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permintaans $keranjangs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permintaans $keranjangs)
    {
        $user = Auth::user();
        $customer = $user->customer;

        if ($customer) {
            foreach ($request->items as $item) {
                $barang = Barangs::where('nama_barang', $item['name'])->first();

                if ($barang) {
                    if ($item['qty'] > 0) {
                        Permintaans::updateOrCreate(
                            ['customer_id' => $customer->id_customer, 'barang_id' => $barang->id_barang],
                            ['kuantitas' => $item['qty']]
                        );
                    } else {
                        // Jika kuantitas 0, hapus dari keranjang
                        Permintaans::where('customer_id', $customer->id_customer)
                            ->where('barang_id', $barang->id_barang)
                            ->delete();
                    }
                }
            }
            return response()->json(['message' => 'Keranjang berhasil diperbarui']);
        } else {
            return response()->json(['message' => 'Customer tidak ditemukan'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $customer = $user->customer;

        if ($customer) {
            $barang = Barangs::where('nama_barang', $request->input('name'))->first();

            if ($barang) {
                Permintaans::where('customer_id', $customer->id_customer)
                    ->where('barang_id', $barang->id_barang)
                    ->delete();

                return response()->json(['message' => 'Item berhasil dihapus dari keranjang']);
            } else {
                return response()->json(['message' => 'Barang tidak ditemukan'], 404);
            }
        } else {
            return response()->json(['message' => 'Customer tidak ditemukan'], 404);
        }
    }
}
