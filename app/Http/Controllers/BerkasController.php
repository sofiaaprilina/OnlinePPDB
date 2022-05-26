<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Pengumuman;
use File;
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
        $alerts = Pengumuman::where('kategori', '=', 'Alert')->get();
        return view('berkas.index', compact('siswas','alerts'));
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
        // $request->validate([
        //     'akte' => 'required|mimes:png,jpg,jpeg|max:5000',
        //     'kk' => 'required|mimes:png,jpg,jpeg|max:5000',
        //     'ktp' => 'required|mimes:png,jpg,jpeg|max:5000',
        //     'gaji' => 'required|mimes:png,jpg,jpeg|max:5000',
        // ]);

        // if($siswa->akte && file_exists(storage_path('app/public/' . $siswa->akte)))
        // {
        //     \Storage::delete('public/'.$siswa->akte);
        // }
        // if($siswa->kk && file_exists(storage_path('app/public/' . $siswa->kk)))
        // {
        //     \Storage::delete('public/'.$siswa->kk);
        // }
        // if($siswa->ktp && file_exists(storage_path('app/public/' . $siswa->ktp)))
        // {
        //     \Storage::delete('public/'.$siswa->ktp);
        // }
        // if($siswa->gaji && file_exists(storage_path('app/public/' . $siswa->gaji)))
        // {
        //     \Storage::delete('public/'.$siswa->gaji);
        // }

        if($request->akte != null){
            $image_name = auth()->id() . '_akte_' . time(). '.'. $request->akte->extension();
            if(File::exists(public_path('uploads/' . $siswa->akte))) {
                File::delete(public_path('uploads/' . $siswa->akte));
            }  
            $request->akte->move(public_path('uploads'), $image_name);
        } else if($request->akte == null && $siswa->akte && file_exists(public_path('uploads/' . $siswa->akte))){
            $image_name = $siswa->akte;
        }

        if($request->kk != null){
            $image_name2 = auth()->id() . '_kk_' . time(). '.'. $request->kk->extension();
            if(File::exists(public_path('uploads/' . $siswa->kk))) {
                File::delete(public_path('uploads/' . $siswa->kk));
            }  
            $request->kk->move(public_path('uploads'), $image_name2);
        } else if($request->kk == null && $siswa->kk && file_exists(public_path('uploads/' . $siswa->kk))){
            $image_name2 = $siswa->kk;
        }

        if($request->ktp != null){
            $image_name3 = auth()->id() . '_ktp_' . time(). '.'. $request->ktp->extension();
            if(File::exists(public_path('uploads/' . $siswa->ktp))) {
                File::delete(public_path('uploads/' . $siswa->ktp));
            }  
            $request->ktp->move(public_path('uploads'), $image_name3);
        } else if($request->ktp == null && $siswa->ktp && file_exists(public_path('uploads/' . $siswa->ktp))){
            $image_name3 = $siswa->ktp;
        }
         
        if($request->gaji != null){
            $image_name4 = auth()->id() . '_gaji_' . time(). '.'. $request->gaji->extension();
            if(File::exists(public_path('uploads/' . $siswa->gaji))) {
                File::delete(public_path('uploads/' . $siswa->gaji));
            }  
            $request->gaji->move(public_path('uploads'), $image_name4);
        } else if($request->gaji == null && $siswa->gaji && file_exists(public_path('uploads/' . $siswa->gaji))){
            $image_name4 = $siswa->gaji;
        }
        // $image_name = $request->file('akte')->store('images', 'public');
        // $image_name2 = $request->file('kk')->store('images', 'public');
        // $image_name3  = $request->file('ktp')->store('images', 'public');
        // $image_name4  = $request->file('gaji')->store('images', 'public');
        // $siswa->akte = $image_name;
        // $siswa->kk = $image_name2;
        // $siswa->ktp = $image_name3;
        // $siswa->save();
        
        $siswas = Siswa::where('id', $id)->update([
            'akte' => $image_name ?? null,
            'kk' => $image_name2 ?? null,
            'ktp' => $image_name3 ?? null,
            'gaji' => $image_name4 ?? null,
        ]);
        return redirect()->route('berkas.index')
                        ->with('success','Berkas Siswa berhasil diupdate');
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
