<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Dokter\Entities\Dokter;
use Modules\Pasien\Entities\Pasien;

class RawatInap extends Model
{
    protected $table = 'rawat_inap';

    protected $fillable = [
        'id_pasien', 'nomor_kamar', 'id_dokter_pj', 'tanggal_masuk', 'tanggal_keluar'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'ktp');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter_pj', 'id');
    }
}
