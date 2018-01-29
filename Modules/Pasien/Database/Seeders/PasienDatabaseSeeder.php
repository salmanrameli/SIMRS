<?php

namespace Modules\Pasien\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Pasien\Entities\Pasien;
use Faker\Factory as Faker;

class PasienDatabaseSeeder extends Seeder
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

        foreach (range(1, 50) as $item)
        {
            $pasien = new Pasien();

            $pasien->id = $item;
            $pasien->nama = $faker->name;
            $pasien->tanggal_lahir = $faker->date();

            $rand1 = mt_rand(0, 3);
            if($rand1 == 0)
            {
                $pasien->golongan_darah = 'A';
            }
            else if($rand1 == 1)
            {
                $pasien->golongan_darah = 'B';
            }
            else if($rand1 == 2)
            {
                $pasien->golongan_darah = 'AB';
            }
            else
            {
                $pasien->golongan_darah = 'O';
            }

            $pasien->alamat = $faker->address;
            $pasien->telepon = $faker->phoneNumber;

            $rand1 = mt_rand(0, 1);
            if($rand1 == 0)
            {
                $pasien->jenkel = 'pria';
            }
            else
            {
                $pasien->jenkel = 'wanita';
            }

            $rand1 = mt_rand(0, 1);
            if($rand1 == 0)
            {
                $pasien->punya_bpjs = 'ya';
            }
            else
            {
                $pasien->punya_bpjs = 'tidak';
            }

            $pasien->save();
        }
    }
}
