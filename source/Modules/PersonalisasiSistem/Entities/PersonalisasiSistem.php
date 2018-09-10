<?php

namespace Modules\PersonalisasiSistem\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class PersonalisasiSistem extends Model
{
    protected $table = 'personalisasi_sistem';

    protected $fillable = [
        'nama'
    ];

    public function userCanAccess(User $user)
    {
        return $user->canAccess(ModulSistem::where('modul', '=', config('personalisasisistem.name'))->value('id'));
    }

    public function userCanCreate(User $user)
    {
        return $user->canCreate(ModulSistem::where('modul', '=', config('personalisasisistem.name'))->value('id'));
    }

    public function userCanRead(User $user)
    {
        return $user->canRead(ModulSistem::where('modul', '=', config('personalisasisistem.name'))->value('id'));
    }

    public function userCanUpdate(User $user)
    {
        return $user->canUpdate(ModulSistem::where('modul', '=', config('personalisasisistem.name'))->value('id'));
    }

    public function userCanDelete(User $user)
    {
        return $user->canDelete(ModulSistem::where('modul', '=', config('personalisasisistem.name'))->value('id'));
    }
}
