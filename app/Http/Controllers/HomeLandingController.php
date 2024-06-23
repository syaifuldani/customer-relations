<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeLandingController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Home',
        ]);
    }
}
