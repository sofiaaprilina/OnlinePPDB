<?php

namespace App\Http\Controllers;

use App\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarPanitiaController extends Controller
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
        $panitias = Panitia::paginate(5);
        return view('daftarpanitia.index',compact('panitias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftarpanitia.create');
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
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',

        ]);
        // $pass = substr(md5(mt_rand()), 1, 8);
        $panitia = Panitia::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'decrypt' => $request->password,
        ]);
   
        return redirect()->route('daftar-panitia.index')
                        ->with('success','Akun panitia berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $panitia = \App\Panitia::find($id);
        return view('daftarpanitia.show',compact('panitia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $panitia = \App\Panitia::find($id);
        return view('daftarpanitia.edit',compact('panitia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Panitia $panitia)
    {
        $panitia = \App\Panitia::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $panitia = $panitia->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'decrypt' => $request->password,
        ]);
        
        return redirect()->route('daftar-panitia.index')
                        ->with('success','Akun panitia berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $panitia = \App\Panitia::find($id);
        $panitia->delete();
  
        return redirect()->route('daftar-panitia.index')
                        ->with('success','Akun panitia berhasil dihapus');
    }

    public function cari(Request $request){
        $cari= $request->get('cariPanitia');
        $panitias = \App\Panitia::where('username', 'LIKE', '%' . $cari . '%')
		->orwhere('name', 'like', '%' . $cari . '%')
		->orwhere('email', 'like', '%' . $cari . '%')
		->paginate(10);
        
	    return view('daftarpanitia.index', ['panitias'=>$panitias]);
    }
}
