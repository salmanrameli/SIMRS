<?php

namespace Modules\Dokter\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Modules\Dokter\Entities\BidangSpesialisDokter;
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

        $faker = Faker::create();

        for($index = 1; $index <= 10; $index++)
        {
            $dokter = new Dokter();
            $dokter->id_dokter = $faker->creditCardNumber;
            $dokter->nama = $faker->name;
            $dokter->alamat = $faker->address;
            $dokter->telepon = $faker->phoneNumber;

            $dokter->save();
        }

        // $this->call("OthersTableSeeder");
    }
}
