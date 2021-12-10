<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
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
        $pendaftars = Pendaftar::paginate(5);
        return view('pendaftar.index',compact('pendaftars'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftar.create');
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
   
        return redirect()->route('pendaftar.index')
                        ->with('success','Pendaftar berhasil ditambahkan');
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
        return view('pendaftar.show',compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftar = \App\Pendaftar::find($id);
        return view('pendaftar.edit',compact('pendaftar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pendaftar = \App\Pendaftar::find($id);
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

        if($pendaftar->bayar && file_exists(storage_path('app/public/' . $pendaftar->bayar)))
        {
            \Storage::delete('public/'.$pendaftar->bayar);
        }
        $image_name = $request->file('bayar')->store('images', 'public');
        $pendaftar->bayar = $image_name;
        $pendaftar->save();
        
        return redirect()->route('pendaftar.index')
                        ->with('success','Pendaftar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftar = \App\Pendaftar::find($id);
        $pendaftar->delete();
  
        return redirect()->route('pendaftar.index')
                        ->with('success','Pendaftar berhasil dihapus');
    }

    public function add($id)
    {
        $pendaftar = \App\Pendaftar::find($id);
        return view('pendaftar.add',compact('pendaftar'));
    }

    public function olah($id, Request $request)
    {
        $user = \App\User::find($id);
        
        $request->validate([
            'idPendaftar' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        $siswa = Siswa::create([
            'idPendaftar' => $request->id,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'user_id' => $user->id,
        ]);

        return redirect()->route('pendaftar.index')
            ->with('success','Siswa berhasil ditambahkan. Silahkan cek menu Data Siswa');
    }

    public function confirm(){
        
    }

    public function connect()
    {
        return view('pendaftar.koneksi');
    }
}
