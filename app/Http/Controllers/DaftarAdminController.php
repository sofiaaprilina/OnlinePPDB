<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarAdminController extends Controller
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
        $admins = Admin::paginate(5);
        return view('daftaradmin.index',compact('admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftaradmin.create');
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
            'password' => 'required',

        ]);
        // $pass = substr(md5(mt_rand()), 1, 8);
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
   
        return redirect()->route('daftar-admin.index')
                        ->with('success','Akun admin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = \App\Admin::find($id);
        return view('daftaradmin.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = \App\Admin::find($id);
        return view('daftaradmin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Admin $admin)
    {
        $admin = \App\Admin::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $admin = $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('daftar-admin.index')
                        ->with('success','Akun admin berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = \App\Admin::find($id);
        $admin->delete();
  
        return redirect()->route('daftar-admin.index')
                        ->with('success','Akun admin berhasil dihapus');
    }

    public function cari(Request $request){
        $cari= $request->get('cariAdmin');
        $admins = Admin::where('name', 'like', '%' . $cari . '%')
		->orwhere('email', 'like', '%' . $cari . '%')
		->paginate(10);
        
	    return view('daftaradmin.index', ['admins'=>$admins]);
    }
}
