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
        'title' => 'PPDB RA QURROTA AYUN websitepercobaan.com',
        'body1' => 'Terimakasih sudah melakukan Pendaftaran Peserta Didik Baru pada RA.Qurrota Ayun Kepanjen.
                    Berikut username dan password untuk login dan selanjutnya dapat melengkapi data-data yang dibutuhkan dalam pendaftaran.',
        'body2' => 'Username: '.$user->username.'',
        'body3' => 'Password: '.$user->decrypt
        ];
       
        \Mail::to($pendaftar->email)->send(new \App\Mail\MyTestMail($details));

        $pendaftar->update([
            'status' => 'Valid'
            ]);
       
        // dd("Email sudah terkirim.");
        return redirect()->route('pendaftar.index')
            ->with('success','Konfirmasi pendaftar berhasil');
    
        }

    public function novalid($id){
        $pendaftar = \App\Pendaftar::find($id);
        $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA QURROTA AYUN websitepercobaan.com',
        'body1' => 'Terimakasih sudah melakukan Pendaftaran Peserta Didik Baru pada RA.Qurrota Ayun Kepanjen.',
        'body2' => 'Mohon Maaf Bukti Pembayaran yang Anda Masukkan Tidak Sesuai.',
        'body3' => 'Mohon Melakukan Pendaftaran Kembali pada web PPDB RA QURROTA AYUN'
        ];
       
        \Mail::to($pendaftar->email)->send(new \App\Mail\MyTestMail($details));

        $pendaftar->update([
            'status' => 'Tidak Valid'
            ]);
       
        // dd("Email sudah terkirim.");
        return redirect()->route('pendaftar.index')
            ->with('success','Konfirmasi pendaftar no valid berhasil');
    
        }
    
    public function berkasvalid($id){
        $siswa = \App\Siswa::find($id);
        // $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA QURROTA AYUN websitepercobaan.com',
        'body1' => 'Terimakasih sudah melakukan Pendaftaran Peserta Didik Baru pada RA.Qurrota Ayun Kepanjen.',
        'body2' => 'Berkas Pendaftaran yang Anda Upload/Masukkan Sudah Sesuai.',
        'body3' => 'Tunggu Informasi Selanjutnya Mengenai Hasil Seleksi pada Website PPDB.'
        ];
       
        \Mail::to($siswa->email)->send(new \App\Mail\MyTestMail($details));

        $siswa::where('id', $id)->update([
            'berkas' => 'Terkonfirmasi'
        ]);
       
        // dd("Email sudah terkirim.");
        return redirect()->route('siswa.index')
            ->with('success','Konfirmasi berkas valid berhasil');
    
        }

    public function berkasnovalid($id){
        $siswa = \App\Siswa::find($id);
        // $user = \App\User::find($id);

        $details = [
        'title' => 'PPDB RA QURROTA AYUN websitepercobaan.com',
        'body1' => 'Terimakasih sudah melakukan Pendaftaran Peserta Didik Baru pada RA.Qurrota Ayun Kepanjen.',
        'body2' => 'Berkas Pendaftaran yang Anda Upload/Masukkan Tidak Sesuai.',
        'body3' => 'Mohon Untuk Melakukan Upload Ulang.'
        ];
       
        \Mail::to($siswa->email)->send(new \App\Mail\MyTestMail($details));

        $siswa->update([
            'berkas' => 'Tidak Valid'
            ]);
       
        // dd("Email sudah terkirim.");
        return redirect()->route('siswa.index')
            ->with('success','Konfirmasi berkas no valid berhasil');
    
        }
}
