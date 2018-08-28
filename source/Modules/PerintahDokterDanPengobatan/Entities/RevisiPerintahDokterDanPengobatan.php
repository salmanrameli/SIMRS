<?php

namespace Modules\PerintahDokterDanPengobatan\Entities;

use Illuminate\Database\Eloquent\Model;

class RevisiPerintahDokterDanPengobatan extends Model
{
    protected $table = 'revisi_perintah_dokter_dan_pengobatan';

    protected $fillable = [
        'id_perintah_dokter_dan_pengobatan', 'catatan_perawat'
    ];
}
