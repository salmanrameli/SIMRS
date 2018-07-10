<?php

namespace Modules\Obat\Entities;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama', 'harga', 'tipe_obat'
    ];
}
