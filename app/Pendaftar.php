<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftars';
    protected $fillable = ['siswa', 'ortu', 'tempat', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'no_telp',
                        'email', 'sekolah', 'bayar', 'tgl_daftar'];
}
