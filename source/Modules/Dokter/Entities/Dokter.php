<?php

namespace Modules\Dokter\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\RawatInap\Entities\RawatInap;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'id_dokter', 'nama', 'alamat', 'telepon', 'bidang_spesialis'
    ];

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_dokter_pj', 'id');
    }
}
