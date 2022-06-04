<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use App\Siswa;
use App\User;
use File;
use PDF;
use Illuminate\Http\Request;

class PendaftarController extends Controller
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
        $pendaftars = Pendaftar::paginate(5);
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('pendaftar.index',compact('pendaftars','daftars','alerts'))
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
        return view('pendaftar.create',compact('daftars','alerts'));
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
        //     'siswa' => 'required',
        //     'ortu' => 'required',
        //     'tempat' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'no_telp' => 'required',
        //     'email' => 'required',
        //     'bayar' => 'required',
        // ]);
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
            $image_name = $request->siswa . '_ijazahPaud_' . time(). '.'. $request->sekolah->extension();
            if(File::exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))) {
                File::delete(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah));
            }  
            $request->sekolah->move(public_path('uploads/ijazahPaud'), $image_name);
            $pendaftar->sekolah = $image_name;
        } else if($request->sekolah == null && $pendaftar->sekolah && file_exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))){
            $image_name = $pendaftar->sekolah;
        }

        if($request->bayar != null){
            $image_name2 = $request->siswa . '_pembayaran_' . time(). '.'. $request->bayar->extension();
            if(File::exists(public_path('buktiPendaftaran' . $pendaftar->bayar))) {
                File::delete(public_path('buktiPendaftaran' . $pendaftar->bayar));
            }  
            $request->bayar->move(public_path('buktiPendaftaran'), $image_name2);
            $pendaftar->bayar = $image_name2;
        } else if($request->bayar == null && $pendaftar->bayar && file_exists(public_path('buktiPendaftaran/' . $pendaftar->bayar))){
            $image_name2 = $pendaftar->bayar;
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
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('pendaftar.show',compact('pendaftar','daftars','alerts'));
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
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        return view('pendaftar.edit',compact('pendaftar','daftars','alerts'));
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
        // $request->validate([
        //     'siswa' => 'required',
        //     'ortu' => 'required',
        //     'tempat' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'no_telp' => 'required',
        //     'email' => 'required',
        //     'bayar' => 'required',
        // ]);
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

        if($request->sekolah != null){
            $image_name = $request->siswa . '_ijazahPaud_' . time(). '.'. $request->sekolah->extension();
            if(File::exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))) {
                File::delete(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah));
            }  
            $request->sekolah->move(public_path('uploads/ijazahPaud'), $image_name);
            $pendaftar->sekolah = $image_name;
        } else if($request->sekolah == null && $pendaftar->sekolah && file_exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))){
            $image_name = $pendaftar->sekolah;
        }

        if($request->bayar != null){
            $image_name2 = $request->siswa . '_pembayaran_' . time(). '.'. $request->bayar->extension();
            if(File::exists(public_path('buktiPendaftaran' . $pendaftar->bayar))) {
                File::delete(public_path('buktiPendaftaran' . $pendaftar->bayar));
            }  
            $request->bayar->move(public_path('buktiPendaftaran'), $image_name2);
            $pendaftar->bayar = $image_name2;
        } else if($request->bayar == null && $pendaftar->bayar && file_exists(public_path('buktiPendaftaran/' . $pendaftar->bayar))){
            $image_name2 = $pendaftar->bayar;
        }
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
        if(File::exists(public_path('buktiPendaftaran' . $pendaftar->bayar))) {
            File::delete(public_path('buktiPendaftaran' . $pendaftar->bayar));
        }
        if(File::exists(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah))) {
            File::delete(public_path('uploads/ijazahPaud/' . $pendaftar->sekolah));
        }
        $pendaftar->delete();
  
        return redirect()->route('pendaftar.index')
                        ->with('success','Pendaftar berhasil dihapus');
    }

    public function add($id)
    {
        $pendaftar = \App\Pendaftar::find($id);
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        return view('pendaftar.add',compact('pendaftar','daftars','alerts'));
    }

    public function olah($id, Request $request)
    {
        $user = \App\User::find($id);
        $pendaftar = \App\Pendaftar::find($id);
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

        $pendaftar->update([
            'status' => 'Terkonfirmasi'
            ]);

        return redirect()->route('pendaftar.index')
            ->with('success','Siswa berhasil ditambahkan. Silahkan cek menu Data Siswa');
    }

    public function cari(Request $request){
        $cari= $request->get('cari');
        $pendaftars = \App\Pendaftar::where('siswa', 'LIKE', '%' . $cari . '%')
		->orwhere('ortu', 'like', '%' . $cari . '%')
		->orwhere('status', 'like', '%' . $cari . '%')
		->paginate(10);
        
	    return view('pendaftar.index', ['pendaftars'=>$pendaftars]);
    }

    public function cetak(){
        $pendaftars = Pendaftar::all();
        // $siswa = Siswa::where('id', $id)->get();
        $pdf = PDF::loadview('pendaftar.cetak_pdf',compact('pendaftars'))->setPaper('letter', 'landscape');
        return $pdf->stream();
    }
}
