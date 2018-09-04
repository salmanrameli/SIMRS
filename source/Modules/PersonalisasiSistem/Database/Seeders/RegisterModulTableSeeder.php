<?php

namespace Modules\PersonalisasiSistem\Database\Seeders;

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
            'nama' => 'personalisasi sistem',
            'modul' => config('personalisasisistem.name'),
            'rute_home' => 'personalisasi.index',
            'nav_id' => 'personalisasi',
            'icon' => 'fas fa-paint-brush'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
