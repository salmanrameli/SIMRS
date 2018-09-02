<?php

namespace Modules\Obat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Modules\Obat\Entities\Obat;

class ObatDatabaseSeeder extends Seeder
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

        foreach (range(1, 10) as $item)
        {
            $obat = new Obat();
            $obat->nama = $faker->company;
            $obat->harga = rand(5, 100);

            $rand1 = mt_rand(0, 4);
            if($rand1 == 0)
            {
                $obat->tipe_obat = 'injeksi';
            }
            if($rand1 == 1)
            {
                $obat->tipe_obat = 'oral';
            }
            if($rand1 == 2)
            {
                $obat->tipe_obat = 'kompress';
            }
            if($rand1 == 3)
            {
                $obat->tipe_obat = 'suppositoria';
            }
            $obat->save();

        }

        $this->call(RegisterModulTableSeeder::class);
    }
}
