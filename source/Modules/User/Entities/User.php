<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\CatatanHarianPerawatan\Entities\CatatanHarianPerawatan;
use Modules\PerintahDokterDanPengobatan\Entities\PerintahDokterDanPengobatan;
use Modules\RawatInap\Entities\RawatInap;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'id_user', 'nama', 'alamat', 'telepon', 'jabatan_id', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_dokter_pj', 'id');
    }

    public function petugas_penerima()
    {
        return $this->hasMany(RawatInap::class, 'id_petugas_penerima', 'id');
    }

    public function perintah_dokter_dan_pengobatan()
    {
        return $this->hasMany(PerintahDokterDanPengobatan::class, 'id_petugas', 'id');
    }

    public function catatan_harian_perawatan()
    {
        return $this->hasMany(CatatanHarianPerawatan::class, 'id_petugas', 'id');
    }
}
