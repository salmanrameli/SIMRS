<?php

namespace Modules\Pasien\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RawatInap\Entities\RawatInap;

class Pasien extends Model
{
    use SoftDeletes;

    protected $table = 'pasien';

    protected $fillable = [
        'id', 'id_penduduk_pasien', 'nama', 'jenkel', 'nama_wali', 'alamat', 'tanggal_lahir', 'telepon', 'pekerjaan', 'agama', 'golongan_darah'
    ];

    protected $dates = ['deleted_at'];

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_pasien', 'id');
    }
}
