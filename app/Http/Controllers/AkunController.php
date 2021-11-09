<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('akun.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.create');
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
            // 'password' => 'required',

        ]);
        $pass = substr(md5(mt_rand()), 1, 8);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($pass),
            'decrypt' => $pass,
        ]);
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->username = $request->username;
        // $user->password = $request->password;
  
        // $user->save();
   
        return redirect()->route('akun.index')
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
        return view('akun.show',compact('user'));
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
        return view('akun.edit',compact('user'));
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->update($request->all());
        $user->save();
        
        return redirect()->route('akun.index')
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
  
        return redirect()->route('akun.index')
                        ->with('success','Akun Pendaftar berhasil dihapus');
    }
}
