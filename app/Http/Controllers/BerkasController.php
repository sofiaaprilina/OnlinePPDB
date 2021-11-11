<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('berkas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berkas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $siswa = \App\Siswa::find($id);
        return view('berkas.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $siswa = \App\Siswa::find($id);
        return view('berkas.edit',compact('siswa'));
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
            'akte' => 'required|mimes:png,jpg,jpeg|max:5000',
            'kk' => 'required|mimes:png,jpg,jpeg|max:5000',
            'ktp' => 'required|mimes:png,jpg,jpeg|max:5000',
        ]);

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
        // $siswa->akte = $image_name;
        // $siswa->kk = $image_name2;
        // $siswa->ktp = $image_name3;
        // $siswa->save();
        
        $siswas = Siswa::where('id', $id)->update([
            'akte' => $image_name,
            'kk' => $image_name2,
            'ktp' => $image_name3,
        ]);
        return redirect()->route('berkas.index')
                        ->with('success','Berkas Siswa berhasil ditambahkan');
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
