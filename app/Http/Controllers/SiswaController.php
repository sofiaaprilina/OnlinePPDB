<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Pendaftar;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:panitia');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::paginate(5);
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('siswa.index',compact('siswas','daftars','alerts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('siswa.create',compact('daftars','alerts'));
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
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('siswa.show',compact('siswa','daftars','alerts'));
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
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('siswa.edit',compact('siswa','daftars','alerts'));
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
        //     'nama' => 'required',
        //     'tempat' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'agama' => 'required',
        //     'alamat' => 'required',
        //     'nm_ayah' => 'required',
        //     'kj_ayah' => 'required',
        //     'no_ayah' => 'required',
        //     'nm_ibu' => 'required',
        //     'kj_ibu' => 'required',
        //     'no_ibu' => 'required',
        //     'email' => 'required',
        //     'akte' => 'required',
        //     'kk' => 'required',
        //     'ktp' => 'required',
        // ]);
        $siswa->nama = $request->nama;
        $siswa->tempat = $request->tempat;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->nm_ayah = $request->nm_ayah;
        $siswa->kj_ayah = $request->kj_ayah;
        $siswa->no_ayah = $request->no_ayah;
        $siswa->status_ayah = $request->status_ayah;
        $siswa->nm_ibu = $request->nm_ibu;
        $siswa->kj_ibu = $request->kj_ibu;
        $siswa->no_ibu = $request->no_ibu;
        $siswa->status_ibu = $request->status_ibu;
        $siswa->email = $request->email;

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
        // $image_name = $request->file('akte')->store('images', 'public');
        // $image_name2 = $request->file('kk')->store('images', 'public');
        // $image_name3  = $request->file('ktp')->store('images', 'public');
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
        $siswa->akte = $image_name ?? null;
        $siswa->kk = $image_name2 ?? null;
        $siswa->ktp = $image_name3 ?? null;
        $siswa->gaji = $image_name4 ?? null;
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
        if(File::exists(public_path('uploads/' . $siswa->akte))) {
            File::delete(public_path('uploads/' . $siswa->akte));
        }
        if(File::exists(public_path('uploads/' . $siswa->kk))) {
            File::delete(public_path('uploads/' . $siswa->kk));
        }
        if(File::exists(public_path('uploads/' . $siswa->ktp))) {
            File::delete(public_path('uploads/' . $siswa->ktp));
        }
        if(File::exists(public_path('uploads/' . $siswa->gaji))) {
            File::delete(public_path('uploads/' . $siswa->gaji));
        }
        $siswa->delete();
  
        return redirect()->route('siswa.index')
                        ->with('success','Siswa berhasil dihapus');
    }
    public function cari(Request $request){
        $cari= $request->get('cari');
        $siswas = \App\Siswa::where('nama', 'LIKE', '%' . $cari . '%')
		->paginate(10);
        
	return view('siswa.index', ['siswas'=>$siswas]);
    }
}
