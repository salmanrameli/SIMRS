<?php

namespace Modules\User\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\RawatInap\Entities\RawatInap;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id_user', 'nama', 'alamat', 'telepon', 'jabatan_id', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_dokter_pj', 'id');
    }
}
