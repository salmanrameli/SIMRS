<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;

class TanggalKeluarRawatInap extends Model
{
    protected $table = 'tanggal_keluar_rawat_inap';

    protected $fillable = [
        'id_rm', 'tanggal_keluar'
    ];

    public function rawat_inap()
    {
        return $this->belongsTo(RawatInap::class, 'id_rm', 'id_rm');
    }
}
