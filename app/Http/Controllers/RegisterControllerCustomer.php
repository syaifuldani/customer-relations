<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterControllerCustomer extends Controller
{
    public function index()
    {
        return view('register.customer.index', [
            'title' => "Register"
        ]);
    }
}
