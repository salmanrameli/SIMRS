<?php

namespace Modules\Jabatan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JabatanDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('jabatan')->insert([
            'nama' => 'administrator'
        ]);

        DB::table('jabatan')->insert([
            'nama' => 'administrasi'
        ]);

        DB::table('jabatan')->insert([
            'nama' => 'perawat'
        ]);

        DB::table('jabatan')->insert([
            'nama' => 'dokter'
        ]);

         $this->call(RegisterModulTableSeeder::class);
    }
}
