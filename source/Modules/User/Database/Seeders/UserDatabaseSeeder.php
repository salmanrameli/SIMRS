<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Faker::create();

        DB::table('users')->insert([
            'id_user' => '1',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan_id' => '1',
            'password' => bcrypt('pass')
        ]);

        DB::table('users')->insert([
            'id_user' => '2',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan_id' => '2',
            'password' => bcrypt('pass')
        ]);

        DB::table('users')->insert([
            'id_user' => '3',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan_id' => '3',
            'password' => bcrypt('pass')
        ]);

        for ($index = 4; $index <= 20; $index++)
        {
            DB::table('users')->insert([
                'id_user' => $index,
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'jabatan_id' => '2',
                'password' => bcrypt('pass')
            ]);
        }

        DB::table('jabatan')->insert([
            'nama' => 'administrator'
        ]);

        DB::table('jabatan')->insert([
            'nama' => 'administrasi'
        ]);

        DB::table('jabatan')->insert([
            'nama' => 'perawat'
        ]);

         //$this->call("JabatanDatabaseSeeder");
    }
}
