<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;

class KonsumsiObatSore extends Model
{
    protected $table = 'konsumsi_obat_sore';

    protected $fillable = [
        'id_konsumsi_obat', 'jumlah', 'id_petugas'
    ];

    public function konsumsi_obat()
    {
        return $this->belongsTo(KonsumsiObat::class, 'id_konsumsi_obat','id');
    }
}
