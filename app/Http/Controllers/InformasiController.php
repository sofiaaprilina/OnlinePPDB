<?php

namespace App\Http\Controllers;

use App\Info;
use File;
use Illuminate\Http\Request;

class InformasiController extends Controller
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
        $informasis = Info::paginate(5);
        return view('informasi.index',compact('informasis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informasi = new Info;
        $informasi->no = $request->no;
        $informasi->keterangan = $request->keterangan;
        if($request->gambar != null){
            $image_name = $request->no.'_'. $request->gambar->extension();
            if(File::exists(public_path('images/info/' . $informasi->gambar))) {
                File::delete(public_path('images/info/' . $informasi->gambar));
            }  
            $request->gambar->move(public_path('images/info/'), $image_name);
            $informasi->gambar = $image_name;
        } else if($request->gambar == null && $informasi->gambar && file_exists(public_path('images/info/' . $informasi->gambar))){
            $image_name = $informasi->gambar;
        }
        $informasi->save();
   
        return redirect()->route('informasi.index')
                        ->with('success','Informasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi = \App\Info::find($id);
        return view('informasi.show',compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = \App\Info::find($id);
        return view('informasi.edit',compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $informasi = \App\info::find($id);
        $informasi->no = $request->no;
        $informasi->keterangan = $request->keterangan;
        if($request->gambar != null){
            $image_name = $request->no.'_'. $request->gambar->extension();
            if(File::exists(public_path('images/info' . $informasi->gambar))) {
                File::delete(public_path('images/info' . $informasi->gambar));
            }  
            $request->gambar->move(public_path('images/info/'), $image_name);
            $informasi->gambar = $image_name;
        } else if($request->gambar == null && $informasi->gambar && file_exists(public_path('images/info/' . $informasi->gambar))){
            $image_name = $informasi->gambar;
        }
        $informasi->save();

        return redirect()->route('informasi.index')
                        ->with('success','Informasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = \App\Info::find($id);
        if(File::exists(public_path('images/info/' . $informasi->gambar))) {
            File::delete(public_path('images/info/' . $informasi->gambar));
        }
        $informasi->delete();
  
        return redirect()->route('informasi.index')
                        ->with('success','Informasi berhasil dihapus');
    }

    public function cari(Request $request){
        $cari= $request->get('cariInformasi');
        $informasis = \App\Info::where('keterangan', 'LIKE', '%' . $cari . '%')
		->paginate(10);
        
	    return view('informasi.index', ['informasis'=>$informasis]);
    }
}
