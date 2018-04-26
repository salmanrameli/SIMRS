<?php

namespace Modules\Dokter\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Modules\User\Entities\User;

class DokterDatabaseSeeder extends Seeder
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

        for($index = 4; $index <= 9; $index++)
        {
            $dokter = new User();
            $dokter->id_user = $index;
            $dokter->nama = $faker->name;
            $dokter->alamat = $faker->address;
            $dokter->telepon = $faker->phoneNumber;
            $dokter->jabatan_id = '4';
            $dokter->password = bcrypt('pass');

            $dokter->save();
        }

        // $this->call("OthersTableSeeder");
    }
}
