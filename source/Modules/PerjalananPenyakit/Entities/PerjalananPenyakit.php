<?php

namespace Modules\PerjalananPenyakit\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\PerintahDokterDanPengobatan\Entities\PerintahDokterDanPengobatan;
use Modules\RawatInap\Entities\RawatInap;

class PerjalananPenyakit extends Model
{
    protected $table = 'perjalanan_penyakit';

    protected $fillable = [
        'id_ranap', 'tanggal_keterangan', 'subjektif', 'objektif', 'assessment', 'planning_perintah_dokter_dan_pengobatan', 'id_petugas'
    ];

    public function rawat_inap()
    {
        return $this->belongsTo(RawatInap::class, 'id_ranap', 'id');
    }

    public function perintah_dokter_dan_pengobatan()
    {
        return $this->hasOne(PerintahDokterDanPengobatan::class, 'id_perjalanan_penyakit', 'id');
    }
}
