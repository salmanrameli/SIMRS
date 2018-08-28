<?php

namespace Modules\CatatanHarianPerawatan\Entities;

use Illuminate\Database\Eloquent\Model;

class RevisiCatatanHarianPerawatan extends Model
{
    protected $table = 'revisi_catatan_harian_perawatan';

    protected $fillable = [
        'id_catatan_harian_perawatan', 'asuhan_keperawatan_soap'
    ];
}
