<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Modules\CatatanHarianPerawatan\Entities\CatatanHarianPerawatan;
use Modules\Jabatan\Entities\Jabatan;
use Modules\ModulSistem\Entities\HakAksesModulSistem;
use Modules\ModulSistem\Entities\ModulSistem;
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

    public function isAdmin()
    {
        if(User::where('id', '=', Auth::id())->value('jabatan_id') == '1')
        {
            return true;
        }

        return false;
    }

    public function isPerawat()
    {
        if(User::where('id', '=', Auth::id())->value('jabatan_id') == '3')
        {
            return true;
        }

        return false;
    }

    public function isDokter()
    {
        if(User::where('id', '=', Auth::id())->value('jabatan_id') == '4')
        {
            return true;
        }

        return false;
    }

    public function canAccess($id_modul)
    {
        return HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', Auth::user()->jabatan_id)->exists();
    }

    public function canCreate($id_modul)
    {
        return HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', Auth::user()->jabatan_id)->value('create');
    }

    public function canRead($id_modul)
    {
        return HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', Auth::user()->jabatan_id)->value('read');
    }

    public function canUpdate($id_modul)
    {
        return HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', Auth::user()->jabatan_id)->value('update');
    }

    public function canDelete($id_modul)
    {
        return HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', Auth::user()->jabatan_id)->value('delete');
    }

    public function userCanAccess()
    {
        return $this->canAccess(ModulSistem::where('modul', '=', config('user.name'))->value('id'));
    }

    public function userCanCreate()
    {
        return $this->canCreate(ModulSistem::where('modul', '=', config('user.name'))->value('id'));
    }

    public function userCanRead()
    {
        return $this->canRead(ModulSistem::where('modul', '=', config('user.name'))->value('id'));
    }

    public function userCanUpdate()
    {
        return $this->canUpdate(ModulSistem::where('modul', '=', config('user.name'))->value('id'));
    }

    public function userCanDelete()
    {
        return $this->canDelete(ModulSistem::where('modul', '=', config('user.name'))->value('id'));
    }

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
