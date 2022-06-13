<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($id, Request $request){
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
        $siswa = \App\Siswa::create([
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
       
        // dd("Email sudah terkirim.");
        return redirect()->route('pendaftar.index')
            ->with('success','Konfirmasi pendaftar berhasil dan pendaftar berhasil ditambahkan ke menu biodata dan berkas siswa');
    
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
        'body3' => 'Hasil Seleksi Akan Ditampilkan di Masing-Masing Akun Pada Website PPDB. Silahkan Memeriksa Akun Anda.'
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

        public function keringanan($id){
            $siswa = \App\Siswa::find($id);
            // $user = \App\User::find($id);
    
            $details = [
            'title' => 'PPDB RA QURROTA AYUN websitepercobaan.com',
            'body1' => 'Terimakasih sudah melakukan Pendaftaran Peserta Didik Baru pada RA.Qurrota Ayun Kepanjen.',
            'body2' => 'Ananda Berhak Mendapatkan Keringanan.',
            'body3' => 'Untuk informasi selanjutnya mengenai keringanan dapat menghubungi panitia.'
            ];
           
            \Mail::to($siswa->email)->send(new \App\Mail\MyTestMail($details));

            $siswa->update([
                'keringanan' => 'Ya'
                ]);
           
            // dd("Email sudah terkirim.");
            return redirect()->route('seleksi.index')
                ->with('success','Konfirmasi keringanan berhasil');
        
        }
}
