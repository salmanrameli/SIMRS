<?php

namespace Modules\Bangunan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\ModulSistem\Entities\ModulSistem;

class RegisterModulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('modul_sistem')->insert([
            'nama' => 'bangunan',
            'modul' => config('bangunan.name'),
            'rute_home' => 'bangunan.index',
            'nav_id' => 'denah_ruangan',
            'icon' => 'fas fa-hospital'
        ]);

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => ModulSistem::where('modul', '=', config('bangunan.name'))->value('id'),
            'id_jabatan' => '1',
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true
        ]);

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => ModulSistem::where('modul', '=', config('bangunan.name'))->value('id'),
            'id_jabatan' => '2',
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false
        ]);

        // $this->call("OthersTableSeeder");
    }
}
