<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengumumans = Pengumuman::where('kategori', '=', 'Dashboard')->get();
        $alerts = Pengumuman::where('kategori', '=', 'Alert')->get();
        return view('user.dashboard', compact('pengumumans','alerts'));
    }
}
