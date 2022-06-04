<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Siswa;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswas = Siswa::all();
        return view('user.changePassword', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update([
            'password'=> Hash::make($request->new_password),
            'decrypt'=>$request->new_password
        ]);
   
        // dd('Password change successfully.');

        return redirect()->route('change.pw')
                        ->with('success','Password berhasil diupdate.');
    }
}
