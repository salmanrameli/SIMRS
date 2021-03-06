<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HariPerawatan\Entities\HariPerawatan;
use Modules\Obat\Entities\Obat;

class KonsumsiObat extends Model
{
    protected $table = 'konsumsi_obat';

    protected $fillable = [
        'id_ranap', 'id_hari_perawatan', 'nama_obat', 'obat_luar', 'dosis', 'id_petugas', 'keterangan'
    ];

    public function hari_perawatan()
    {
        return $this->belongsTo(HariPerawatan::class, 'id_hari_perawatan', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'nama_obat', 'nama');
    }

    public function konsumsi_obat_pagi()
    {
        return $this->hasOne(KonsumsiObatPagi::class, 'id_konsumsi_obat', 'id');
    }

    public function konsumsi_obat_siang()
    {
        return $this->hasOne(KonsumsiObatSiang::class, 'id_konsumsi_obat', 'id');
    }

    public function konsumsi_obat_sore()
    {
        return $this->hasOne(KonsumsiObatSore::class, 'id_konsumsi_obat', 'id');
    }

    public function konsumsi_obat_malam()
    {
        return $this->hasOne(KonsumsiObatMalam::class, 'id_konsumsi_obat', 'id');
    }
}
