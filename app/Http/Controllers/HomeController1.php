<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use App\Siswa;
use Illuminate\Http\Request;

class HomeController1 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:panitia');
    }
    
    public function index()
    {
        $pendaftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('panitia.dashboard', compact('pendaftars','alerts'));
    }
}
