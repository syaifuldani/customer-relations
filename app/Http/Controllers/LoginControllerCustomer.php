<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginControllerCustomer extends Controller
{
    public function create()
    {
        return view('login.customer.index', [
            'title' => 'Login',
        ]);
    }

    public function authentication(Request $request)
    {
        // Validasi input
        $credentials =  $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Debugging credentials
        // dd($credentials);

        // Coba untuk autentikasi
        if (auth()->attempt($credentials)) {
            // Autentikasi berhasil, dapatkan pengguna
            $user = Auth::user();
            // dd($user);

            // Cek peran pengguna
            if ($user->role === 'customer') {
                // Jika peran adalah customer, dapatkan data pengguna beserta relasi customer
                $userData = User::with('customer')->find($user->id);
                session(['userData' => $userData]);
                return redirect()->intended(route('home'));
            } else {
                // Jika peran bukan customer, logout dan kembalikan pesan kesalahan
                Auth::logout();
                return back()->with('error', 'Hanya pelanggan yang dapat login di sini!');
            }
        } else {
            // Debugging autentikasi gagal
            // dd('Autentikasi gagal');
        }

        // Jika autentikasi gagal, kembalikan pesan kesalahan
        return back()->with('error', 'Login Gagal! Silahkan cek username dan password anda!');
    }
}
