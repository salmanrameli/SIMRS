<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;

class CatatanHarianPerawatan extends Model
{
    protected $table = 'catatan_harian_perawatan';

    protected $fillable = [
        'id_pasien', 'tanggal_keterangan', 'jam', 'asuhan_keperawatan_soap', 'id_petugas'
    ];
}
