<?php

namespace Modules\User\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'nama', 'alamat', 'telepon', 'jabatan', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
