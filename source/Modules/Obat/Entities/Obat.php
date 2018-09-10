<?php

namespace Modules\Obat\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\KonsumsiObat\Entities\KonsumsiObat;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama', 'harga', 'tipe_obat'
    ];

    public function userCanAccess(User $user)
    {
        return $user->canAccess(ModulSistem::where('modul', '=', config('obat.name'))->value('id'));
    }

    public function userCanCreate(User $user)
    {
        return $user->canCreate(ModulSistem::where('modul', '=', config('obat.name'))->value('id'));
    }

    public function userCanRead(User $user)
    {
        return $user->canRead(ModulSistem::where('modul', '=', config('obat.name'))->value('id'));
    }

    public function userCanUpdate(User $user)
    {
        return $user->canUpdate(ModulSistem::where('modul', '=', config('obat.name'))->value('id'));
    }

    public function userCanDelete(User $user)
    {
        return $user->canDelete(ModulSistem::where('modul', '=', config('obat.name'))->value('id'));
    }

    public function konsumsi_obat()
    {
        return $this->hasMany(KonsumsiObat::class, 'id_obat', 'id');
    }
}
