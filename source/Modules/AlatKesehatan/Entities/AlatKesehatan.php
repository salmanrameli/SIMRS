<?php

namespace Modules\AlatKesehatan\Entities;

use Illuminate\Database\Eloquent\Model;

class AlatKesehatan extends Model
{
    protected $table = 'alat_kesehatan';

    protected $fillable = [
        'nama', 'harga'
    ];
}
