<?php

namespace Modules\Bangunan\Entities;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien'
    ];

    public function lantai()
    {
        return $this->belongsTo(Lantai::class, 'id', 'id');
    }
}
