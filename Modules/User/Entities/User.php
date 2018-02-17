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
        'id_user', 'nama', 'alamat', 'telepon', 'jabatan', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
