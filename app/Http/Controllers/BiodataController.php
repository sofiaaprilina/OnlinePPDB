<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('biodata.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata.create');
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
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nm_ayah' => 'required',
            'kj_ayah' => 'required',
            'no_ayah' => 'required',
            'nm_ibu' => 'required',
            'kj_ibu' => 'required',
            'no_ibu' => 'required',
            'email' => 'required',

        ]);
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->tempat = $request->tempat;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->nm_ayah = $request->nm_ayah;
        $siswa->kj_ayah = $request->kj_ayah;
        $siswa->no_ayah = $request->no_ayah;
        $siswa->nm_ibu = $request->nm_ibu;
        $siswa->kj_ibu = $request->kj_ibu;
        $siswa->no_ibu = $request->no_ibu;
        $siswa->email = $request->email;
        $siswa->user_id = Auth::user()->id;
  
        $siswa->save();
   
        return redirect()->route('biodata.show',$siswa->id )
                        ->with('success','Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('biodata.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
