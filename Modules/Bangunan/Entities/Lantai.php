<?php

namespace Modules\Bangunan\Entities;

use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    protected $table = 'lantai';

    protected $fillable = [
        'nomor_lantai'
    ];

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id', 'id');
    }
}
