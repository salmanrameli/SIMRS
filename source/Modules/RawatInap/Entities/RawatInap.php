<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    protected $table = 'rawat_inap';

    protected $fillable = [
        'nama_pasien', 'nomor_kamar', 'dokter_pj', 'tanggal_masuk', 'tanggal_keluar'
    ];
}
