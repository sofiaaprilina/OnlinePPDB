<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';
    protected $fillable = ['tanggal','judul','pamflet','isi'];
    
}
