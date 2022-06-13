<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['idPendaftar', 'no_kk', 'nik', 'nama', 'tempat', 'tgl_lahir', 'jenis_kelamin', 'agama', 'alamat', 'nik_ayah', 'nm_ayah', 'kj_ayah', 'no_ayah', 'ph_ayah', 'status_ayah',
                        'nik_ibu', 'nm_ibu', 'kj_ibu', 'ph_ibu', 'no_ibu', 'status_ibu', 'nm_wali', 'kj_wali', 'ph_wali', 'no_wali', 'tanggungan', 'email', 'akte', 'kk', 'ktp', 
                        'gaji', 'berkas', 'status', 'keringanan', 'user_id'];
    
    public function user()
    {
        return $this->hasOne('App\User', 'user_id');
    }
    
    public function pendaftar()
    {
        return $this->hasOne('App\Pendaftar', 'idPendaftar');
    }                  
}
