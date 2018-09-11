<?php

namespace Modules\Jabatan\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $fillable = ['nama'];

    public function userCanAccess(User $user)
    {
        return $user->canAccess(ModulSistem::where('modul', '=', config('jabatan.name'))->value('id'));
    }

    public function userCanCreate(User $user)
    {
        return $user->canCreate(ModulSistem::where('modul', '=', config('jabatan.name'))->value('id'));
    }

    public function userCanRead(User $user)
    {
        return $user->canRead(ModulSistem::where('modul', '=', config('jabatan.name'))->value('id'));
    }

    public function userCanUpdate(User $user)
    {
        return $user->canUpdate(ModulSistem::where('modul', '=', config('jabatan.name'))->value('id'));
    }

    public function userCanDelete(User $user)
    {
        return $user->canDelete(ModulSistem::where('modul', '=', config('jabatan.name'))->value('id'));
    }

    public function user()
    {
        return $this->hasMany(User::class, 'jabatan_id', 'id');
    }

    public function modul_sistem()
    {
        return $this->belongsToMany(ModulSistem::class, 'hak_akses_modul_sistem', 'id_jabatan', 'id_modul')->withPivot('create', 'read', 'update', 'delete')->withTimestamps();
    }
}
