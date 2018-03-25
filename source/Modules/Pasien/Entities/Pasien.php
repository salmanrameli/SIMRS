<?php

namespace Modules\Pasien\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\RawatInap\Entities\PerjalananPenyakit;
use Modules\RawatInap\Entities\RawatInap;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'id', 'ktp', 'nama', 'jenkel', 'nama_wali', 'alamat', 'tanggal_lahir', 'telepon', 'pekerjaan', 'agama', 'golongan_darah'
    ];

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_pasien', 'ktp');
    }

    public function perjalanan_penyakit()
    {
        return $this->hasMany(PerjalananPenyakit::class, 'id_pasien', 'id');
    }
}
