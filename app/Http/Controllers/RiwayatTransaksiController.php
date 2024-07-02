<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Keranjangs;
use App\Models\Permintaans;
use Illuminate\Http\Request;
use App\Models\LaporanPenjualan;
use App\Models\RiwayatTransaksi;
use Illuminate\Support\Facades\Auth;

class RiwayatTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // \Log::info('Request received at: ' . now());
        // \Log::info('Request Data: ', $request->all());
        $data = $request->all();
        // \Log::info('Data yang diterima:', $data);

        try {
            // Validasi request
            $request->validate([
                'barang' => 'required|array',
                'barang.*.name' => 'required|string',
                'barang.*.qty' => 'required|integer|min:1',
                'total_harga' => 'required|numeric|min:0',
                'metode_pembayaran' => 'required|string'
            ]);

            // Mengambil customer_id dari placeOrder
            $customer_id = $request->customer_id;

            // Simpan riwayat transaksi idateanatean database
            $riwayatTransaksi = LaporanPenjualan::create([
                'customer_id' => $customer_id,
                'barang' => json_encode($request->barang),
                'total_harga' => $request->total_harga,
                'metode_pembayaran' => $request->metode_pembayaran
            ]);

            // Hapus items dari keranjang setelah berhasil disimpan ke riwayat transaksi
            $itemsInCart = Permintaans::where('customer_id', $customer_id)->get();
            foreach ($itemsInCart as $item) {
                $item->delete();
            }

            return response()->json(['message' => 'Order placed successfully!', 'data' => $riwayatTransaksi], 201);
        } catch (\Exception $e) {
            // \Log::error($e);
            return response()->json(['error' => 'Failed to place order.'], 500);
        }
    }

    public function show()
    {
        try {
            // Get the logged-in customer's ID
            $customerId = Auth::id();

            // Fetch transactions only for the logged-in customer
            $riwayatTransaksi = LaporanPenjualan::where('customer_id', $customerId)->get();

            // Log the transactions for debugging
            // \Log::info('Transactions fetched for customer ID ' . $customerId . ': ' . $riwayatTransaksi->toJson());

            return response()->json($riwayatTransaksi);
        } catch (\Exception $e) {
            // \Log::error($e);
            return response()->json(['error' => 'Failed to fetch riwayat transaksi.'], 500);
        }
    }



    public function showNota($id)
    {
        try {
            $riwayatTransaksi = LaporanPenjualan::findOrFail($id);
            return response()->json($riwayatTransaksi);
        } catch (\Exception $e) {
            // \Log::error($e);
            return response()->json(['error' => 'Riwayat transaksi not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPenjualan $riwayatTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanPenjualan $riwayatTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPenjualan $riwayatTransaksi)
    {
        //
    }
}
