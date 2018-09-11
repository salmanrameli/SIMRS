<?php

namespace Modules\Dokter\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class Dokter extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id_user', 'nama', 'alamat', 'telepon', 'jabatan_id', 'password'
    ];

    public function userCanAccess(User $user)
    {
        return $user->canAccess(ModulSistem::where('modul', '=', config('dokter.name'))->value('id'));
    }

    public function userCanCreate(User $user)
    {
        return $user->canCreate(ModulSistem::where('modul', '=', config('dokter.name'))->value('id'));
    }

    public function userCanRead(User $user)
    {
        return $user->canRead(ModulSistem::where('modul', '=', config('dokter.name'))->value('id'));
    }

    public function userCanUpdate(User $user)
    {
        return $user->canUpdate(ModulSistem::where('modul', '=', config('dokter.name'))->value('id'));
    }

    public function userCanDelete(User $user)
    {
        return $user->canDelete(ModulSistem::where('modul', '=', config('dokter.name'))->value('id'));
    }
}
