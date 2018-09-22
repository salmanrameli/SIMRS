<?php

namespace Modules\RawatInap\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\Pasien\Entities\Pasien;
use Modules\PerjalananPenyakit\Entities\PerjalananPenyakit;
use Modules\User\Entities\User;

class RawatInap extends Model
{
    protected $table = 'rawat_inap';

    protected $fillable = [
        'id_rm', 'id_pasien', 'tanggal_masuk', 'estimasi_biaya', 'pembayaran', 'jaminan', 'nama_penanggungjawab_pembayaran', 'alamat_penanggungjawab_pembayaran', 'telepon_penanggungjawab_pembayaran', 'hubungan_penanggungjawab', 'dokter_pengirim', 'id_petugas_penerima', 'diagnosa_awal', 'icd_x_diagnosa_awal', 'id_dokter_pj', 'diagnosa_sekunder', 'icd_x_diagnosa_sekunder', 'nomor_kamar'
    ];

    public function userCanAccess(User $user)
    {
        $is_admin = $user->isAdmin();

        $can_access = $user->canAccess(ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'));

        return ($can_access || $is_admin);
    }

    public function userCanCreate(User $user)
    {
        $is_admin = $user->isAdmin();

        $can_create = $user->canCreate(ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'));

        return ($can_create || $is_admin);
    }

    public function userCanRead(User $user)
    {
        $is_admin = $user->isAdmin();

        $can_read = $user->canRead(ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'));

        return ($can_read || $is_admin);
    }

    public function userCanUpdate(User $user)
    {
        $is_admin = $user->isAdmin();

        $can_update = $user->canUpdate(ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'));

        return ($can_update || $is_admin);
    }

    public function userCanDelete(User $user)
    {
        $is_admin = $user->isAdmin();

        $can_delete = $user->canDelete(ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'));

        return ($can_delete || $is_admin);
    }

    public function userIsDokter(User $user)
    {
        return $user->isDokter();
    }

    public function userIsPerawat(User $user)
    {
        return $user->isPerawat();
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_dokter_pj', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class,'id_petugas_penerima', 'id');
    }

    public function perjalanan_penyakit()
    {
        return $this->hasMany(PerjalananPenyakit::class, 'id_ranap', 'id');
    }

    public function tanggal_keluar()
    {
        return $this->hasMany(TanggalKeluarRawatInap::class, 'id_rm', 'id_rm');
    }
}
