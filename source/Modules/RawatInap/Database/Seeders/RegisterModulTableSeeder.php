<?php

namespace Modules\RawatInap\Database\Seeders;

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
            'nama' => 'rawat inap',
            'modul' => config('rawatinap.name'),
            'rute_home' => 'ranap.index',
            'nav_id' => 'pasien_ranap',
            'icon' => 'fas fa-procedures'
        ]);

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'),
            'id_jabatan' => '2',
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true
        ]);

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'),
            'id_jabatan' => '3',
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false
        ]);

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id'),
            'id_jabatan' => '1',
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false
        ]);

        // $this->call("OthersTableSeeder");
    }
}
