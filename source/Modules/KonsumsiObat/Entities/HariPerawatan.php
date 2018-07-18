<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Tensi\Entities\TensiMalam;
use Modules\Tensi\Entities\TensiPagi;
use Modules\Tensi\Entities\TensiSiang;
use Modules\Tensi\Entities\TensiSore;

class HariPerawatan extends Model
{
    protected $table = 'hari_perawatan';

    protected $fillable = [
        'id_ranap', 'tanggal', 'hari_perawatan', 'tinggi_badan', 'berat_badan', 'id_petugas'
    ];

    public function konsumsi_obat()
    {
        return $this->hasMany(KonsumsiObat::class, 'id_hari_perawatan', 'id');
    }

    public function tensi_pagi()
    {
        return $this->hasOne(TensiPagi::class, 'id_hari_perawatan', 'id');
    }

    public function tensi_siang()
    {
        return $this->hasOne(TensiSiang::class, 'id_hari_perawatan', 'id');
    }

    public function tensi_sore()
    {
        return $this->hasOne(TensiSore::class, 'id_hari_perawatan', 'id');
    }

    public function tensi_malam()
    {
        return $this->hasOne(TensiMalam::class, 'id_hari_perawatan', 'id');
    }
}
