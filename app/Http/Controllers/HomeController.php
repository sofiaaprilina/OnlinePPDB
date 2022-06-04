<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\Siswa;

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
        $pengumumans = Pengumuman::all();
        $siswas = Siswa::all();
        
        foreach ($siswas as $siswa) {
            if ($siswa->status == 'Lolos') {
                alert()->success('Silahkan mencetak bukti pendaftaran dan melakukan daftar ulang sesuai jadwal yang ditentukan.', 'Selamat Ananda Lolos Seleksi');
            } 
            else if($siswa->status == 'Tidak Lolos') {
                alert()->error('Jangan kecewa masih banyak kesempatan lain. Terima kasih sudah mendaftar', 'Maaf Ananda Tidak Lolos Seleksi');
            }
        }
        
        return view('user.dashboard', compact('pengumumans','siswas'));
    }
}
