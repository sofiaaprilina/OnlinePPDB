<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Pengumuman;
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
        $alerts = Pengumuman::where('kategori', '=', 'Alert')->get();
        return view('biodata.index', compact('siswas','alerts'));
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
        // $request->validate([
        //     'nama' => 'required',
        //     'tempat' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'agama' => 'required',
        //     'alamat' => 'required',
        //     'nm_ayah' => 'required',
        //     'kj_ayah' => 'required',
        //     'ph_ayah' => 'required',
        //     'no_ayah' => 'required',
        //     'nm_ibu' => 'required',
        //     'kj_ibu' => 'required',
        //     'ph_ibu' => 'required',
        //     'no_ibu' => 'required',
        //     'tanggungan' => 'required',
        //     'email' => 'required',

        // ]);
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->tempat = $request->tempat;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->nm_ayah = $request->nm_ayah;
        $siswa->kj_ayah = $request->kj_ayah;
        $siswa->ph_ayah = $request->ph_ayah;
        $siswa->no_ayah = $request->no_ayah;
        $siswa->status_ayah = $request->status_ayah;
        $siswa->nm_ibu = $request->nm_ibu;
        $siswa->kj_ibu = $request->kj_ibu;
        $siswa->ph_ibu = $request->ph_ibu;
        $siswa->no_ibu = $request->no_ibu;
        $siswa->status_ibu = $request->status_ibu;
        $siswa->tanggungan = $request->tanggungan;
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
    public function update($id, Request $request)
    {
        $siswa = \App\Siswa::find($id);
        // $request->validate([
        //     'agama' => 'required',
        //     'alamat' => 'required',
        //     'nm_ayah' => 'required',
        //     'kj_ayah' => 'required',
        //     'ph_ayah' => 'required',
        //     'no_ayah' => 'required',
        //     'nm_ibu' => 'required',
        //     'kj_ibu' => 'required',
        //     'ph_ibu' => 'required',
        //     'no_ibu' => 'required',
        //     'tanggungan' => 'required',
        //     'email' => 'required',
        // ]);

        $siswas = Siswa::where('id', $id)->update([
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'nm_ayah' => $request->nm_ayah,
            'kj_ayah' => $request->kj_ayah,
            'ph_ayah' => $request->ph_ayah,
            'no_ayah' => $request->no_ayah,
            'status_ayah' => $request->status_ayah,
            'nm_ibu' => $request->nm_ibu,
            'kj_ibu' => $request->kj_ibu,
            'ph_ibu' => $request->ph_ibu,
            'no_ibu' => $request->no_ibu,
            'status_ibu' => $request->status_ibu,
            'tanggungan' => $request->tanggungan,
            'email' => $request->email,
        ]);
        return redirect()->route('biodata.index')
                        ->with('success','Biodata siswa berhasil diperbarui');
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
