<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use File;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendaftar = new Pendaftar;
        $pendaftar->siswa = $request->siswa;
        $pendaftar->ortu = $request->ortu;
        $pendaftar->tempat = $request->tempat;
        $pendaftar->tgl_lahir = $request->tgl_lahir;
        $pendaftar->jenis_kelamin = $request->jenis_kelamin;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->no_telp = $request->no_telp;
        $pendaftar->email = $request->email;
        // $pendaftar->sekolah = $request->sekolah;
        $pendaftar->tgl_daftar = $request->tgl_daftar;
        // if($request->file('bayar')){
        //     $image_name = $request->file('bayar')->store('images','public');
        //     $pendaftar->bayar = $image_name;
        // }
        if($request->sekolah != null){
            $image_name = $request->id . '_ijazahPaud_' . time(). '.'. $request->sekolah->extension();
            if(File::exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))) {
                File::delete(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah));
            }  
            $request->sekolah->move(public_path('uploads/ijazahPaud'), $image_name);
            $pendaftar->sekolah = $image_name;
        } else if($request->sekolah == null && $pendaftar->sekolah && file_exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))){
            $image_name = $pendaftar->sekolah;
        }

        if($request->bayar != null){
            $image_name2 = $request->id . '_pembayaran_' . time(). '.'. $request->bayar->extension();
            if(File::exists(public_path('buktiPendaftaran' . $pendaftar->bayar))) {
                File::delete(public_path('buktiPendaftaran' . $pendaftar->bayar));
            }  
            $request->bayar->move(public_path('buktiPendaftaran'), $image_name2);
            $pendaftar->bayar = $image_name2;
        } else if($request->bayar == null && $pendaftar->bayar && file_exists(public_path('buktiPendaftaran/' . $pendaftar->bayar))){
            $image_name2 = $pendaftar->bayar;
        }
  
        $pendaftar->save();
   
        return redirect()->route('form.index')
                        ->with('success','Pendaftar Sukses, Tunggu Konfirmasi Selanjutnya');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftar = \App\Pendaftar::find($id);
        return view('form.index',compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftar $pendaftar)
    {
        //
    }
}
