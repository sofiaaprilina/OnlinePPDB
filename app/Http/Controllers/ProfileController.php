<?php

namespace App\Http\Controllers;

use App\Info;
use App\Tampilan;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $fasilitas = Tampilan::where('kategori','=','Fasilitas')->get();
        $ekskul = Tampilan::where('kategori','=','Ekskul')->get();
        $kegiatan = Tampilan::where('kategori','=','Kegiatan')->get();
        $guru = Tampilan::where('kategori','=','Dewan Guru')->get();
        $ppdb = Tampilan::where('kategori','=','PPDB')->get();
        $fismot = Tampilan::where('judul', '=', 'FISIK MOTORIK')->get();
        $kagama = Tampilan::where('judul', '=', 'KEGIATAN KEAGAMAAN')->get();
        $kouting = Tampilan::where('judul','=','OUTING CLASS')->get();
        $kbesar = Tampilan::where('judul','=','PERINGATAN HARI BESAR / HARI ISLAM')->get();
        $kdaring = Tampilan::where('judul','=','PEMBELAJARAN DARING')->get();
        $kluring = Tampilan::where('judul','=','PEMBELAJARAN LURING')->get();
        $motorik = Tampilan::where('kategori','=','Sub Kegiatan-Fisik Motorik')->get();
        $keagamaan = Tampilan::where('kategori','=','Sub Kegiatan-Keagamaan')->get();
        $outing = Tampilan::where('kategori','=','Sub Kegiatan-Outing Class')->get();
        $hrbesar = Tampilan::where('kategori','=','Sub Kegiatan-Peringatan Hari Besar')->get();
        $daring = Tampilan::where('kategori','=','Sub Kegiatan-Daring')->get();
        $luring = Tampilan::where('kategori','=','Sub Kegiatan-Luring')->get();

        return view('beranda',compact('fasilitas','ekskul','kegiatan','guru','ppdb',
                                        'fismot','kagama','kouting','kbesar','kdaring','kluring',
                                        'motorik','keagamaan','outing','hrbesar','daring','luring'));
    }

    public function ppdb()
    {
        $informasis = Info::all();
        return view('frontpage', compact('informasis'));
    }
}
