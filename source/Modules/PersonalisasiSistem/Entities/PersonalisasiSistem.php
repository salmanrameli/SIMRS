<?php

namespace Modules\PersonalisasiSistem\Entities;

use Illuminate\Database\Eloquent\Model;

class PersonalisasiSistem extends Model
{
    protected $table = 'personalisasi_sistem';

    protected $fillable = [
        'nama'
    ];
}
