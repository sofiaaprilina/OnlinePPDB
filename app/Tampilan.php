<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tampilan extends Model
{
    protected $table = 'tampilans';
    protected $fillable = ['no','kategori','file','link','judul'];
}
