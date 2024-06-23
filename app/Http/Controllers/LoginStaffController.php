<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginStaffController extends Controller
{
    public function index()
    {
        return view('login.staff.index', [
            'title' => 'Login'
        ]);
    }
}
