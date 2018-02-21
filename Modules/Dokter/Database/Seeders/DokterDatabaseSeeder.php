<?php

namespace Modules\Dokter\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Modules\Dokter\Entities\Dokter;

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

        $faker =Faker::create();

        $bs1 = $faker->currencyCode;
        $bs2 = $faker->currencyCode;
        $bs3 = $faker->currencyCode;

        for($index = 1; $index <= 10; $index++)
        {
            $dokter = new Dokter();
            $dokter->id_dokter = $faker->creditCardNumber;
            $dokter->nama = $faker->name;
            $dokter->alamat = $faker->address;
            $dokter->telepon = $faker->phoneNumber;

            $random = mt_rand(1, 3);

            if($random == 1)
            {
                $dokter->bidang_spesialis = $bs1;
            }
            else if($random == 2)
            {
                $dokter->bidang_spesialis = $bs2;
            }
            else if($random == 3)
            {
                $dokter->bidang_spesialis = $bs3;
            }

            $dokter->save();
        }

        // $this->call("OthersTableSeeder");
    }
}
