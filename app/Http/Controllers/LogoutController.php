<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->role == 'staf-penjualan') {
            session()->forget('userData');
            Auth::logout();
            return redirect()->route('home_landing');
        } else if (auth()->user()->role == 'staf-distribusi') {
            session()->forget('userData');
            Auth::logout();
            return redirect()->route('home_landing');
        } else {
            session()->forget('userData');
            Auth::logout();
            return redirect()->route('home_landing');
        }
    }
}
