<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use App\Siswa;
use App\User;
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
        $daftars = Pendaftar::all();
        $siswas = Siswa::all();
        $users = User::all();
        $seleksi = Siswa::where('status', '=', 'Lolos')->get();
        $confirms = Pendaftar::where('status', '=', 'Terkonfirmasi')->get();
        $checks = Siswa::where('berkas', '=', 'Terkonfirmasi')->get();
        return view('panitia.dashboard', compact('pendaftars','alerts','daftars','siswas','users','seleksi','confirms','checks'));
    }
}
