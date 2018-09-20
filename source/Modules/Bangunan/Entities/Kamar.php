<?php

namespace Modules\Bangunan\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien', 'biaya_per_malam'
    ];

    public function userCanCreate(User $user)
    {
        return $user->canCreate(ModulSistem::where('modul', '=', config('bangunan.name'))->value('id'));
    }

    public function userCanUpdate(User $user)
    {
        return $user->canUpdate(ModulSistem::where('modul', '=', config('bangunan.name'))->value('id'));
    }

    public function userCanDelete(User $user)
    {
        return $user->canDelete(ModulSistem::where('modul', '=', config('bangunan.name'))->value('id'));
    }

    public function lantai()
    {
        return $this->belongsTo(Lantai::class, 'id', 'id');
    }
}
