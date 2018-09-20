<?php

namespace Modules\Bangunan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;

class BangunanDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $lantai = new Lantai();
        $lantai->nomor_lantai = '1';
        $lantai->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '1';
        $kamar->nama_kamar = '1.1';
        $kamar->jumlah_maks_pasien = '1';
        $kamar->biaya_per_malam = '500000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '1';
        $kamar->nama_kamar = '1.2';
        $kamar->jumlah_maks_pasien = '2';
        $kamar->biaya_per_malam = '300000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '1';
        $kamar->nama_kamar = '1.3';
        $kamar->jumlah_maks_pasien = '3';
        $kamar->biaya_per_malam = '200000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '1';
        $kamar->nama_kamar = '1.4';
        $kamar->jumlah_maks_pasien = '4';
        $kamar->biaya_per_malam = '150000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '1';
        $kamar->nama_kamar = '1.5';
        $kamar->jumlah_maks_pasien = '4';
        $kamar->biaya_per_malam = '150000';
        $kamar->save();



        $lantai = new Lantai();
        $lantai->nomor_lantai = '2';
        $lantai->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '2';
        $kamar->nama_kamar = '2.1';
        $kamar->jumlah_maks_pasien = '1';
        $kamar->biaya_per_malam = '500000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '2';
        $kamar->nama_kamar = '2.2';
        $kamar->jumlah_maks_pasien = '2';
        $kamar->biaya_per_malam = '300000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '2';
        $kamar->nama_kamar = '2.3';
        $kamar->jumlah_maks_pasien = '3';
        $kamar->biaya_per_malam = '200000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '2';
        $kamar->nama_kamar = '2.4';
        $kamar->jumlah_maks_pasien = '4';
        $kamar->biaya_per_malam = '150000';
        $kamar->save();

        $kamar = new Kamar();
        $kamar->nomor_lantai = '2';
        $kamar->nama_kamar = '2.5';
        $kamar->jumlah_maks_pasien = '4';
        $kamar->biaya_per_malam = '150000';
        $kamar->save();

        $this->call(RegisterModulTableSeeder::class);
    }
}
