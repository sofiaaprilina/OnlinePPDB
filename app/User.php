<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idPendaftar', 'name', 'username', 'email', 'password', 'decrypt',
    ];

    public function siswa()
    {
        return $this->hasOne('App\Siswa', 'user_id');
    }
    public function pendaftar(){
        return $this->hasOne('App\Pendaftar', 'idPendaftar')->onDelete('cascade')->onUpdate('cascade');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
