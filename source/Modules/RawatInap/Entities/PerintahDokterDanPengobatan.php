<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;

class PerintahDokterDanPengobatan extends Model
{
    protected $table = 'perintah_dokter_dan_pengobatan';

    protected $fillable = [
        'id_pasien', 'tanggal_keterangan', 'terapi_dan_rencana_tindakan', 'catatan_perawat', 'id_petugas', 'id_perjalanan_penyakit'
    ];
}
