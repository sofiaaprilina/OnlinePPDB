<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['idPendaftar', 'nama', 'tempat', 'tgl_lahir', 'jenis_kelamin', 'agama', 'alamat', 'nm_ayah', 'kj_ayah', 'no_ayah', 'ph_ayah',
                        'nm_ibu', 'kj_ibu', 'ph_ibu', 'no_ibu', 'nm_wali', 'kj_wali', 'ph_wali', 'no_wali', 'tanggungan', 'email', 'akte', 'kk', 'ktp', 
                        'gaji', 'user_id'];
    
    public function user()
    {
        return $this->hasOne('App\User', 'user_id');
    }
    
    public function pendaftar()
    {
        return $this->hasOne('App\Pendaftar', 'idPendaftar');
    }                  
}
