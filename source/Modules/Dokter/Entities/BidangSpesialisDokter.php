<?php

namespace Modules\Dokter\Entities;

use Illuminate\Database\Eloquent\Model;

class BidangSpesialisDokter extends Model
{
    protected $table = 'bidang_spesialis_dokter';

    protected $fillable = [
        'nama'
    ];
}
