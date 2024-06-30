<?php

namespace App\Http\Controllers;

use App\Models\Keranjangs;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\Customers;
use App\Models\RiwayatTransaksi;
use App\Models\Staff;
use Auth;

class KeranjangsController extends Controller
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
        \Log::info('Store request received', $request->all());

        $user = Auth::user();
        $customer = $user->customer;

        if ($customer) {
            foreach ($request->items as $item) {
                $barang = Barangs::where('nama_barang', $item['name'])->first();

                if ($barang) {
                    if ($item['qty'] > 0) {
                        Keranjangs::updateOrCreate(
                            ['customer_id' => $customer->id_customer, 'barang_id' => $barang->id_barang],
                            ['kuantitas' => $item['qty']]
                        );
                    } else {
                        // Jika kuantitas 0, hapus dari keranjang
                        Keranjangs::where('customer_id', $customer->id_customer)
                            ->where('barang_id', $barang->id_barang)
                            ->delete();
                    }
                }
            }
            return response()->json(['message' => 'Keranjang berhasil disimpan']);
        } else {
            return response()->json(['message' => 'Customer tidak ditemukan'], 404);
        }
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
            $keranjangItems = Keranjangs::where('customer_id', $customer->id_customer)
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
    public function edit(Keranjangs $keranjangs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjangs $keranjangs)
    {
        $user = Auth::user();
        $customer = $user->customer;
    
        if ($customer) {
            foreach ($request->items as $item) {
                $barang = Barangs::where('nama_barang', $item['name'])->first();
    
                if ($barang) {
                    if ($item['qty'] > 0) {
                        Keranjangs::updateOrCreate(
                            ['customer_id' => $customer->id_customer, 'barang_id' => $barang->id_barang],
                            ['kuantitas' => $item['qty']]
                        );
                    } else {
                        // Jika kuantitas 0, hapus dari keranjang
                        Keranjangs::where('customer_id', $customer->id_customer)
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
                Keranjangs::where('customer_id', $customer->id_customer)
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
