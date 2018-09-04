<?php

namespace Modules\AlatKesehatan\Database\Seeders;

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
            'nama' => 'alat kesehatan',
            'modul' => config('alatkesehatan.name'),
            'rute_home' => 'alat_kesehatan.index',
            'nav_id' => 'manajemen_alkes',
            'icon' => 'fas fa-toolbox'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
