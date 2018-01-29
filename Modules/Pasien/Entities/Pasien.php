<?php

namespace Modules\Pasien\Entities;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'id', 'nama', 'tanggal_lahir', 'golongan_darah', 'alamat', 'telepon', 'jenkel', 'punya_bpjs'
    ];
}
