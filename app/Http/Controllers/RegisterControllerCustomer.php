<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterControllerCustomer extends Controller
{
    public function create()
    {
        return view('register.customer.index', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:login,username',
            'password' => 'required|string|min:8',
            'konfirmasi-password' => 'required|same:password',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email',
        ]);

        $login = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'customer',
        ]);

        Customers::create([
            'login_id' => $login->id,
            'nama_customer' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
