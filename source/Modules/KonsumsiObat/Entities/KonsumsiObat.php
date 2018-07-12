<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Obat\Entities\Obat;

class KonsumsiObat extends Model
{
    protected $table = 'konsumsi_obat';

    protected $fillable = [
        'id_ranap', 'tanggal', 'hari_perawatan', 'id_obat', 'dosis', 'tinggi_badan', 'berat_badan'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
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
