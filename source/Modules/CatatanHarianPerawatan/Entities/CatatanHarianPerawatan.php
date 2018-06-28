<?php

namespace Modules\CatatanHarianPerawatan\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class CatatanHarianPerawatan extends Model
{
    protected $table = 'catatan_harian_perawatan';

    protected $fillable = [
        'id_pasien', 'tanggal_keterangan', 'jam', 'asuhan_keperawatan_soap', 'id_petugas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }
}
