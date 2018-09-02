<?php

namespace Modules\User\Database\Seeders;

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
            'nama_modul' => 'staff rs',
            'rute_home' => 'user.index',
            'nav_id' => 'manajemen_staff_jabatan',
            'icon' => 'fas fa-users-cog'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
