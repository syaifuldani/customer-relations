<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $credentials =  $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'customer') {
                $userData = User::with('customer')->find($user->id);
                session(['userData' => $userData]);
                return redirect()->intended(route('home'));
            } else {
                Auth::logout();
                return back()->with('error', 'Hanya pelanggan yang dapat login di sini!');
            }
        }
        return back()->with('error', 'Login Gagal! Silahkan cek username dan password anda!');
    }
}
