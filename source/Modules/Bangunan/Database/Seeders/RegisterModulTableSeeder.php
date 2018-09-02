<?php

namespace Modules\Bangunan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            'nama_modul' => 'bangunan',
            'rute_home' => 'bangunan.index',
            'nav_id' => 'denah_ruangan',
            'icon' => 'fas fa-hospital'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
