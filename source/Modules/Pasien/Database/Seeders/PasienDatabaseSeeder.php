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

            $pasien->id_penduduk_pasien = $faker->creditCardNumber;
            $pasien->nama = $faker->name;

            $rand1 = mt_rand(0, 1);
            if($rand1 == 0)
            {
                $pasien->jenkel = 'laki-laki';
            }
            else
            {
                $pasien->jenkel = 'perempuan';
            }

            $pasien->nama_wali = $faker->name;
            $pasien->alamat = $faker->address;
            $pasien->tanggal_lahir = $faker->date();
            $pasien->telepon = $faker->phoneNumber;
            $pasien->pekerjaan = $faker->jobTitle;

            $rand1 = mt_rand(0, 4);
            if($rand1 == 0)
            {
                $pasien->agama = 'islam';
            }
            else if($rand1 == 1)
            {
                $pasien->agama = 'katolik';
            }
            else if($rand1 == 2)
            {
                $pasien->agama = 'protestan';
            }
            else if($rand1 == 3)
            {
                $pasien->agama = 'hindu';
            }
            else
            {
                $pasien->agama = 'buddha';
            }

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

            $pasien->save();
        }
    }
}
