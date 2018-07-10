<?php

namespace Modules\KonsumsiObat\Entities;

use Illuminate\Database\Eloquent\Model;

class KonsumsiObat extends Model
{
    protected $table = 'konsumsi_obat';

    protected $fillable = [
        'id_ranap', 'tanggal', 'hari_perawatan', 'id_obat', 'dosis', 'jumlah', 'waktu', 'tinggi_badan', 'berat_badan', 'id_petugas'
    ];

}
