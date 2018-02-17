<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $fillable = ['nama'];

    public function user()
    {
        return $this->hasMany(User::class, 'jabatan_id');
    }
}
