<?php

namespace Modules\ModulSistem\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Jabatan\Entities\Jabatan;

class ModulSistem extends Model
{
    protected $table = 'modul_sistem';

    protected $fillable = [
        'nama_modul', 'rute_home', 'icon'
    ];

    public function jabatan()
    {
        return $this->belongsToMany(Jabatan::class, 'hak_akses_modul_sistem', 'id_modul', 'id_jabatan')->withPivot('create', 'read', 'update', 'delete')->withTimestamps();
    }
}
