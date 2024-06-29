<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginStaffController extends Controller
{
    public function index()
    {
        return view('login.staff.index', [
            'title' => 'Login'
        ]);
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            // Autentikasi berhasil, dapatkan pengguna
            $user = Auth::user();
            // dd($user);

            // Cek peran pengguna
            if ($user->role === 'staf-distribusi') {
                // Jika peran adalah customer, dapatkan data pengguna beserta relasi customer
                $userData = User::with('staff')->find($user->id);
                session(['userData' => $userData]);
                return redirect()->intended(route('dashboardDistribusi'));
            } elseif ($user->role === 'staf-penjualan') {
                $userData = User::with('staff')->find($user->id);
                session(['userData' => $userData]);
                return redirect()->intended(route('dashboardPenjualan'));
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
