<?php

namespace Modules\Dokter\Entities;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'id_dokter', 'nama', 'alamat', 'telepon', 'bidang_spesialis'
    ];
}
