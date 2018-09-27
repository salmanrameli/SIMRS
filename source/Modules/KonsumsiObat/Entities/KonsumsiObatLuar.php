<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HariPerawatan\Entities\HariPerawatan;
use Modules\RawatInap\Entities\RawatInap;

class KonsumsiObatLuar extends Model
{
    protected $table = 'konsumsi_obat_luar';

    protected $fillable = [
        'id_ranap', 'nama_obat'
    ];

    public function rawat_inap()
    {
        return $this->belongsTo(RawatInap::class, 'id_ranap', 'id');
    }

    public function hari_perawatan()
    {
        return $this->belongsTo(HariPerawatan::class, 'id_ranap', 'id_ranap');
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
