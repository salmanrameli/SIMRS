<?php

namespace Modules\ModulSistem\Database\Seeders;

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
            'id' => '1',
            'nama_modul' => 'modul sistem',
            'rute_home' => 'modul.index',
            'nav_id' => 'modul_sistem',
            'icon' => 'fas fa-hdd'
        ]);

        $id_modul = ModulSistem::where('nama_modul', '=', 'modul sistem')->value('id');

        DB::table('hak_akses_modul_sistem')->insert([
            'id_modul' => $id_modul,
            'id_jabatan' => '1'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
