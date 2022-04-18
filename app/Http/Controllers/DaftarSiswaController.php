<?php

namespace App\Http\Controllers;

use App\User;
use App\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DaftarSiswaController extends Controller
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
        $users = User::paginate(5);
        return view('daftarsiswa.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendaftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        return view('daftarsiswa.create', compact('pendaftars'));
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
            'name' => 'required',
            'idPendaftar' => 'required',
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            // 'password' => 'required',

        ]);

        $pass = substr(md5(mt_rand()), 1, 8);
        $user = User::create([
            'idPendaftar' => $request->get('idPendaftar'),
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($pass),
            'decrypt' => $pass,
        ]);

        return redirect()->route('daftar-siswa.index')
                        ->with('success','Akun Pendaftar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::find($id);
        return view('daftarsiswa.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        return view('daftarsiswa.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, User $user)
    {
        $user = \App\User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        $user = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'decrypt' => $request->password,
        ]);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->username = $request->username;

        // $user->update($request->all());
        // $user->save();
        
        return redirect()->route('daftar-siswa.index')
                        ->with('success','Akun Pendaftar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->delete();
  
        return redirect()->route('daftar-siswa.index')
                        ->with('success','Akun Pendaftar berhasil dihapus');
    }

    public function cari(Request $request){
        $cari= $request->get('cariSiswa');
        $users = User::where('username', 'LIKE', '%' . $cari . '%')
		->orwhere('name', 'like', '%' . $cari . '%')
		->paginate(10);
        
	    return view('daftarsiswa.index', ['users'=>$users]);
    }
}
