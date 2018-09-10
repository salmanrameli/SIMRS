<?php

namespace Modules\Pasien\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\RawatInap\Entities\RawatInap;
use Modules\User\Entities\User;
use Sofa\Eloquence\Eloquence;

class Pasien extends Model
{
    use SoftDeletes, Eloquence;

    protected $table = 'pasien';

    protected $searchableColumns = ['id_penduduk_pasien'];

    protected $fillable = [
        'id', 'id_penduduk_pasien', 'nama', 'jenkel', 'nama_wali', 'alamat', 'tanggal_lahir', 'telepon', 'pekerjaan', 'agama', 'golongan_darah'
    ];

    protected $dates = ['deleted_at'];

    public function userCanAccess(User $user)
    {
        return $user->canAccess(ModulSistem::where('modul', '=', config('pasien.name'))->value('id'));
    }

    public function userCanCreate(User $user)
    {
        return $user->canCreate(ModulSistem::where('modul', '=', config('pasien.name'))->value('id'));
    }

    public function userCanRead(User $user)
    {
        return $user->canRead(ModulSistem::where('modul', '=', config('pasien.name'))->value('id'));
    }

    public function userCanUpdate(User $user)
    {
        return $user->canUpdate(ModulSistem::where('modul', '=', config('pasien.name'))->value('id'));
    }

    public function userCanDelete(User $user)
    {
        return $user->canDelete(ModulSistem::where('modul', '=', config('pasien.name'))->value('id'));
    }

    public function rawat_inap()
    {
        return $this->hasMany(RawatInap::class, 'id_pasien', 'id');
    }
}
