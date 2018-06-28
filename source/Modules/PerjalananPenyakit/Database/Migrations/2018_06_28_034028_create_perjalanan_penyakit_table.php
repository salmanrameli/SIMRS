<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjalananPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjalanan_penyakit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pasien');
            $table->date('tanggal_keterangan');
            $table->text('subjektif');
            $table->text('objektif');
            $table->text('assessment');
            $table->text('planning_perintah_dokter_dan_pengobatan');
            $table->string('id_petugas');
            $table->string('id_perintah_dokter_dan_pengobatan');
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
        Schema::dropIfExists('perjalanan_penyakit');
    }
}
