<?php

namespace Modules\User\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'id', 'nama', 'alamat', 'telepon', 'jabatan', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
