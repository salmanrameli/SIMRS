<?php

namespace Modules\Bangunan\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class Lantai extends Model
{
    protected $table = 'lantai';

    protected $fillable = [
        'nomor_lantai'
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

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id', 'id');
    }
}
