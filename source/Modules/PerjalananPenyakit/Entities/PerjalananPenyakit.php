<?php

namespace Modules\PerjalananPenyakit\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Pasien\Entities\Pasien;
use Modules\PerintahDokterDanPengobatan\Entities\PerintahDokterDanPengobatan;

class PerjalananPenyakit extends Model
{
    protected $table = 'perjalanan_penyakit';

    protected $fillable = [
        'id_pasien', 'tanggal_keterangan', 'subjektif', 'objektif', 'assessment', 'planning_perintah_dokter_dan_pengobatan', 'id_petugas'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function perintah_dokter_dan_pengobatan()
    {
        return $this->hasOne(PerintahDokterDanPengobatan::class, 'id_perjalanan_penyakit', 'id');
    }
}
