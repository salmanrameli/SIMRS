<?php

namespace Modules\RawatInap\Database\Seeders;

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
            'nama_modul' => 'rawat inap',
            'rute_home' => 'ranap.index',
            'nav_id' => 'pasien_ranap',
            'icon' => 'fas fa-procedures'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
