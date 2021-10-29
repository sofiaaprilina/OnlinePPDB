<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::paginate(5);
        return view('siswa.index',compact('siswas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            'akte' => 'required',
            'kk' => 'required',
            'ktp' => 'required',
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
        if($request->file('akte')){
            $image_name = $request->file('akte')->store('images','public');
            $siswa->akte = $image_name;
        }
        if($request->file('kk')){
            $image_name = $request->file('kk')->store('images','public');
            $siswa->kk = $image_name;
        }
        if($request->file('ktp')){
            $image_name = $request->file('ktp')->store('images','public');
            $siswa->ktp = $image_name;
        }
  
        $siswa->save();
   
        return redirect()->route('siswa.index')
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
        return view('siswa.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa.edit',compact('siswa'));
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
            'akte' => 'required',
            'kk' => 'required',
            'ktp' => 'required',
        ]);
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

        if($siswa->akte && file_exists(storage_path('app/public/' . $siswa->akte)))
        {
            \Storage::delete('public/'.$siswa->akte);
        }
        if($siswa->kk && file_exists(storage_path('app/public/' . $siswa->kk)))
        {
            \Storage::delete('public/'.$siswa->kk);
        }
        if($siswa->ktp && file_exists(storage_path('app/public/' . $siswa->ktp)))
        {
            \Storage::delete('public/'.$siswa->ktp);
        }
        $image_name = $request->file('akte')->store('images', 'public');
        $image_name2 = $request->file('kk')->store('images', 'public');
        $image_name3  = $request->file('ktp')->store('images', 'public');
        $siswa->akte = $image_name;
        $siswa->kk = $image_name2;
        $siswa->ktp = $image_name3;
        $siswa->save();
        
        return redirect()->route('siswa.index')
                        ->with('success','Siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
  
        return redirect()->route('siswa.index')
                        ->with('success','Siswa berhasil dihapus');
    }
}
