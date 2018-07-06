<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Pasien\Entities\Pasien;
use Modules\PerjalananPenyakit\Entities\PerjalananPenyakit;
use Modules\User\Entities\User;

class RawatInap extends Model
{
    protected $table = 'rawat_inap';

    protected $fillable = [
        'id_rm', 'id_pasien', 'nomor_kamar', 'id_dokter_pj', 'dokter_pengirim', 'id_petugas_penerima', 'diagnosa_awal', 'icd_x_diagnosa_awal', 'diagnosa_sekunder', 'icd_x_diagnosa_sekunder', 'tanggal_masuk'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'ktp');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_dokter_pj', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class,'id_petugas_penerima', 'id');
    }

    public function perjalanan_penyakit()
    {
        return $this->hasMany(PerjalananPenyakit::class, 'id_ranap', 'id');
    }

    public function tanggal_keluar()
    {
        return $this->hasMany(TanggalKeluarRawatInap::class, 'id_rm', 'id_rm');
    }
}
