<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;

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
}
