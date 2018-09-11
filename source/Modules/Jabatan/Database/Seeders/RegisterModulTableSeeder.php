<?php

namespace Modules\Jabatan\Database\Seeders;

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
            'nama' => 'jabatan',
            'modul' => config('jabatan.name'),
            'rute_home' => 'jabatan.index',
            'nav_id' => 'manajemen_jabatan',
            'icon' => 'fas fa-certificate'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
