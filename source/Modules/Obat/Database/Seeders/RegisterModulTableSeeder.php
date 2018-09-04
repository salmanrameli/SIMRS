<?php

namespace Modules\Obat\Database\Seeders;

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
            'nama' => 'obat',
            'modul' => config('obat.name'),
            'rute_home' => 'obat.index',
            'nav_id' => 'manajemen_obat',
            'icon' => 'fas fa-pills'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
