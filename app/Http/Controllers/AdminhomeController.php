<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Panitia;
use App\User;
use App\Pengumuman;
use Illuminate\Http\Request;

class AdminhomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $admin = Admin::get();
        $panitia   = Panitia::get();
        $siswa      = User::get();
        $pengumuman = Pengumuman::get();
        return view('admin.dashboard', compact('admin', 'panitia', 'siswa','pengumuman'));
    }
}
