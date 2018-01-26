<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'id' => '1',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan' => 'administrator',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan' => 'petugas',
            'password' => bcrypt('petugas')
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'nama' => $faker->name,
            'alamat' => $faker->address,
            'telepon' => $faker->phoneNumber,
            'jabatan' => 'kasir',
            'password' => bcrypt('kasir')
        ]);
    }
}
