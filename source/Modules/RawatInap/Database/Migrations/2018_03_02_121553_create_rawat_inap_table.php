<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama_pasien');
            $table->string('nomor_kamar');
            $table->string('dokter_pj');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawat_inap');
    }
}
