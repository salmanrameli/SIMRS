<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $fillable = ['nama'];

    public function user()
    {
        return $this->hasMany(User::class, 'jabatan_id', 'id');
    }

    public function modul_sistem()
    {
        return $this->belongsToMany(ModulSistem::class, 'hak_akses_modul_sistem', 'id_jabatan', 'id_modul')->withPivot('create', 'read', 'update', 'delete')->withTimestamps();
    }
}
