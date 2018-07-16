<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;

class KonsumsiObatMalam extends Model
{
    protected $table = 'konsumsi_obat_malam';

    protected $fillable = [
        'id_konsumsi_obat', 'sudah', 'id_petugas'
    ];

    public function konsumsi_obat()
    {
        return $this->belongsTo(KonsumsiObat::class, 'id_konsumsi_obat','id');
    }
}
