<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumumans = Pengumuman::paginate(5);
        return view('pengumuman.index',compact('pengumumans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengumuman = new Pengumuman;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->kategori = $request->kategori;
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->save();
   
        return redirect()->route('pengumuman.index')
                        ->with('success','Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = \App\Pengumuman::find($id);
        return view('pengumuman.show',compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = \App\Pengumuman::find($id);
        return view('pengumuman.edit',compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pengumuman = \App\Pengumuman::find($id);
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->kategori = $request->kategori;
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->save();

        return redirect()->route('pengumuman.index')
                        ->with('success','Pengumuman berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = \App\Pengumuman::find($id);
        $pengumuman->delete();
  
        return redirect()->route('pengumuman.index')
                        ->with('success','Pengumuman berhasil dihapus');
    }

    public function cari(Request $request){
        $cari= $request->get('cari');
        $pengumumans = \App\Pengumuman::where('judul', 'LIKE', '%' . $cari . '%')
		->orwhere('isi', 'like', '%' . $cari . '%')
		->orwhere('kategori', 'like', '%' . $cari . '%')
		->paginate(10);
        
	    return view('pengumuman.index', ['pengumumans'=>$pengumumans]);
    }
}
