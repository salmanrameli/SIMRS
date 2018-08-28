<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisiPerjalananPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_perjalanan_penyakit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_perjalanan_penyakit');
            $table->text('subjektif');
            $table->text('objektif');
            $table->text('assessment');
            $table->text('planning_perintah_dokter_dan_pengobatan');
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
        Schema::dropIfExists('revisi_perjalanan_penyakit');
    }
}
