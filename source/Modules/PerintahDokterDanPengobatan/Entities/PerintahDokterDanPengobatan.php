<?php

namespace Modules\PerintahDokterDanPengobatan\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\PerjalananPenyakit\Entities\PerjalananPenyakit;

class PerintahDokterDanPengobatan extends Model
{
    protected $table = 'perintah_dokter_dan_pengobatan';

    protected $fillable = [
        'tanggal_keterangan', 'id_perjalanan_penyakit', 'catatan_perawat', 'id_petugas'
    ];

    public function perjalanan_penyakit()
    {
        return $this->belongsTo(PerjalananPenyakit::class, 'id_perjalanan_penyakit', 'id');
    }
}
