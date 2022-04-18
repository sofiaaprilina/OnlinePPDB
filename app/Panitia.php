<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Panitia extends Authenticable
{
    use Notifiable;

    protected $guard = 'panitia';

    protected $fillable = [
        'name', 'email', 'username', 'password','email_verfied_at', 'decrypt',
    ];

    protected $hidden = ['remember_token'];
}
