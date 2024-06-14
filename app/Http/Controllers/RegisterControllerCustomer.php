<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterControllerCustomer extends Controller
{
    public function showRegistrationForm()
    {
        return view('register.customer.index', [
            'title' => "Register"
        ]);
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:login,email',
                'username' => 'required|string|max:255|unique:login,username',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8|same:password',
            ]
        );

        $login = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'customer',
        ]);

        Customers::create([
            'nama_customer' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect(route('login'))->with('success', 'User registered successfully.');
    }
}
