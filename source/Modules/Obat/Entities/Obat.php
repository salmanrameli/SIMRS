<?php

namespace Modules\Obat\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\KonsumsiObat\Entities\KonsumsiObat;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama', 'harga', 'tipe_obat'
    ];

    public function konsumsi_obat()
    {
        return $this->hasMany(KonsumsiObat::class, 'id_obat', 'id');
    }
}
