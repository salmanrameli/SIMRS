<?php

namespace Modules\Tensi\Entities;

use Illuminate\Database\Eloquent\Model;

class Tensi extends Model
{
    protected $table = 'tensi';

    protected $fillable = [
        'id_ranap', 'id_hari_perawatan', 'id_petugas'
    ];
}
