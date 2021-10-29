<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama', 'tempat', 'tgl_lahir', 'jenis_kelamin', 'agama', 'alamat', 'nm_ayah', 'kj_ayah', 'no_ayah',
                        'nm_ibu', 'kj_ibu', 'no_ibu', 'nm_wali', 'kj_wali', 'no_wali', 'email', 'akte', 'kk', 'ktp'];
}
