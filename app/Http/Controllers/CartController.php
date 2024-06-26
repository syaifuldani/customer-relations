<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjangs;
use App\Models\Barangs;
use App\Models\Customers;
use Auth;

class CartController extends Controller
{
    public function saveCart(Request $request)
    {
        $user = Auth::user();
        $customer = $user->customer;

        if ($customer) {
            foreach ($request->items as $item) {
                $barang = Barangs::where('nama_barang', $item['name'])->first();

                if ($barang) {
                    Keranjangs::updateOrCreate(
                        ['customer_id' => $customer->id_customer, 'barang_id' => $barang->id_barang],
                        ['kuantitas' => $item['qty']]
                    );
                }
            }
            return response()->json(['message' => 'Cart saved successfully']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
