<?php

namespace Modules\Pasien\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\RawatInap\Entities\RawatInap;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'id', 'ktp', 'nama', 'tanggal_lahir', 'golongan_darah', 'alamat', 'telepon', 'jenkel'
    ];

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_pasien', 'ktp');
    }
}
