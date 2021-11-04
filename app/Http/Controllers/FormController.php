<?php

namespace App\Http\Controllers;

use App\Pendaftar;
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
        $request->validate([
            'siswa' => 'required',
            'ortu' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'bayar' => 'required',
        ]);
        $pendaftar = new Pendaftar;
        $pendaftar->siswa = $request->siswa;
        $pendaftar->ortu = $request->ortu;
        $pendaftar->tempat = $request->tempat;
        $pendaftar->tgl_lahir = $request->tgl_lahir;
        $pendaftar->jenis_kelamin = $request->jenis_kelamin;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->no_telp = $request->no_telp;
        $pendaftar->email = $request->email;
        $pendaftar->sekolah = $request->sekolah;
        $pendaftar->tgl_daftar = $request->tgl_daftar;
        if($request->file('bayar')){
            $image_name = $request->file('bayar')->store('images','public');
            $pendaftar->bayar = $image_name;
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
