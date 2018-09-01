<?php

namespace Modules\ModulSistem\Entities;

use Illuminate\Database\Eloquent\Model;

class HakAksesModulSistem extends Model
{
    protected $table = 'hak_akses_modul_sistem';

    protected $fillable = [
        'id_modul', 'id_jabatan'
    ];
}
