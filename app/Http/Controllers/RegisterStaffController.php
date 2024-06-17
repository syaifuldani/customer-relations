<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;

class RegisterStaffController extends Controller
{
    public function index()
    {
        return view('register.staff.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:login',
            'username' => 'required|string|unique:login',
            'password' => 'required',
            'konfirmasi-password' => 'required|same:password',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric',
            'role' => 'required'
        ]);

        $login = User::create([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role
        ]);

        Staff::create([
            'login_id' => $login->id,
            'nama_staff' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);
        return redirect()->route('daftarstaff')->with('success', 'Registration successful!');
    }
}
