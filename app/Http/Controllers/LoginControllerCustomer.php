<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginControllerCustomer extends Controller
{
    public function index()
    {
        return view('login.customer.login', [
            'title' => 'Login',
        ]);
    }
}
