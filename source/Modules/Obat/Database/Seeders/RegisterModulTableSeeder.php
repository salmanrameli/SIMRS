<?php

namespace Modules\Obat\Database\Seeders;

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
            'nama' => 'obat',
            'modul' => config('obat.name'),
            'rute_home' => 'obat.index',
            'nav_id' => 'manajemen_obat',
            'icon' => 'fas fa-pills'
        ]);

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => ModulSistem::where('modul', '=', config('obat.name'))->value('id'),
            'id_jabatan' => '1',
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true
        ]);

        // $this->call("OthersTableSeeder");
    }
}
