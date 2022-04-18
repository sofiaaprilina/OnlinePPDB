<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController1 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:panitia');
    }
    
    public function index()
    {
        return view('panitia.dashboard');
    }
}
