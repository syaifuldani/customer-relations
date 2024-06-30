<?php

namespace App\Http\Controllers;

use App\Models\RiwayatTransaksi;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use App\Models\Customers;
use Auth;

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
        \Log::info('Request received at: ' . now());
        \Log::info('Request Data: ', $request->all());
        $data = $request->all();
        \Log::info('Data yang diterima:', $data);

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

            // Simpan riwayat transaksi ke database
            $riwayatTransaksi = RiwayatTransaksi::create([
                'customer_id' => $customer_id,
                'barang' => json_encode($request->barang),
                'total_harga' => $request->total_harga,
                'metode_pembayaran' => $request->metode_pembayaran
            ]);

            // Hapus items dari keranjang setelah berhasil disimpan ke riwayat transaksi
            $itemsInCart = Keranjangs::where('customer_id', $customer_id)->get();
            foreach ($itemsInCart as $item) {
                $item->delete();
            }

            return response()->json(['message' => 'Order placed successfully!', 'data' => $riwayatTransaksi], 201);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Failed to place order.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatTransaksi $riwayatTransaksi)
    {
        try {
            $riwayatTransaksis = RiwayatTransaksi::all();
            return response()->json($riwayatTransaksis);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Failed to fetch riwayat transaksi.'], 500);
        }
    }

    public function showNota($id)
    {
        try {
            $riwayatTransaksi = RiwayatTransaksi::findOrFail($id);
            return response()->json($riwayatTransaksi);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Riwayat transaksi not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatTransaksi $riwayatTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatTransaksi $riwayatTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatTransaksi $riwayatTransaksi)
    {
        //
    }
}
