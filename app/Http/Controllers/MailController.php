<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($id){
        $pendaftar = \App\Pendaftar::find($id);
        $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA Qurrota Ayun',
        'body' => 'Berikut adalah akun untuk melakukan login pada website PPDB RA. Qurrota Ayun
                username: '.$user->username.' password: '.$user->decrypt
        ];
       
        \Mail::to($pendaftar->email)->send(new \App\Mail\MyTestMail($details));
       
        // dd("Email sudah terkirim.");
        return redirect()->route('pendaftar.index')
            ->with('success','Konfirmasi pendaftar berhasil');
    
        }

    public function novalid($id){
        $pendaftar = \App\Pendaftar::find($id);
        $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA Qurrota Ayun',
        'body' => 'Mohon Maaf Bukti Pembayaran yang Anda Masukkan Tidak Sesuai. 
                Mohon Melakukan Pendaftaran Kembali'
        ];
       
        \Mail::to($pendaftar->email)->send(new \App\Mail\MyTestMail($details));
       
        // dd("Email sudah terkirim.");
        return redirect()->route('pendaftar.index')
            ->with('success','Konfirmasi pendaftar no valid berhasil');
    
        }
    
    public function berkasvalid($id){
        $siswa = \App\Siswa::find($id);
        // $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA Qurrota Ayun',
        'body' => 'Berkas Pendaftaran yang Anda Upload Sudah Sesuai.
                Tunggu Informasi Selanjutnya Mengenai Hasil Selesi.'
        ];
       
        \Mail::to($siswa->email)->send(new \App\Mail\MyTestMail($details));
       
        // dd("Email sudah terkirim.");
        return redirect()->route('siswa.index')
            ->with('success','Konfirmasi berkas valid berhasil');
    
        }

    public function berkasnovalid($id){
        $siswa = \App\Siswa::find($id);
        // $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA Qurrota Ayun',
        'body' => 'Berkas Pendaftaran yang Anda Upload Tidak Sesuai.
                Mohon Untuk Melakukan Upload Ulang.'
        ];
       
        \Mail::to($siswa->email)->send(new \App\Mail\MyTestMail($details));
       
        // dd("Email sudah terkirim.");
        return redirect()->route('siswa.index')
            ->with('success','Konfirmasi berkas no valid berhasil');
    
        }
}
