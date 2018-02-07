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
            'id' => '1',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan' => 'administrator',
            'password' => bcrypt('pass')
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan' => 'petugas',
            'password' => bcrypt('pass')
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan' => 'kasir',
            'password' => bcrypt('pass')
        ]);
        // $this->call("OthersTableSeeder");
    }
}
