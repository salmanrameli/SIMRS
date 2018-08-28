<?php

namespace Modules\PerjalananPenyakit\Entities;

use Illuminate\Database\Eloquent\Model;

class RevisiPerjalananPenyakit extends Model
{
    protected $table = 'revisi_perjalanan_penyakit';

    protected $fillable = [
       'id_perjalanan_penyakit', 'subjektif', 'objektif', 'assessment', 'planning_perintah_dokter_dan_pengobatan'
    ];
}
