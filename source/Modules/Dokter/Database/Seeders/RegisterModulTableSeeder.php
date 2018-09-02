<?php

namespace Modules\Dokter\Database\Seeders;

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
            'nama_modul' => 'dokter',
            'rute_home' => 'dokter.index',
            'nav_id' => 'manajemen_dokter',
            'icon' => 'fas fa-user-md'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
