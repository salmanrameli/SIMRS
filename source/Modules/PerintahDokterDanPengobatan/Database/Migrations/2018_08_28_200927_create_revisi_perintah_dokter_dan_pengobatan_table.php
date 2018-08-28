<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisiPerintahDokterDanPengobatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_perintah_dokter_dan_pengobatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_perintah_dokter_dan_pengobatan');
            $table->text('catatan_perawat')->nullable();
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
        Schema::dropIfExists('revisi_perintah_dokter_dan_pengobatan');
    }
}
