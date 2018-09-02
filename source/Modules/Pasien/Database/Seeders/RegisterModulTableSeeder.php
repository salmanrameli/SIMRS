<?php

namespace Modules\Pasien\Database\Seeders;

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
            'nama_modul' => 'pasien',
            'rute_home' => 'pasien.index',
            'nav_id' => 'manajemen_data_pasien',
            'icon' => 'fas fa-heartbeat'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
