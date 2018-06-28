<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerintahDokterDanPengobatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perintah_dokter_dan_pengobatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pasien');
            $table->date('tanggal_keterangan');
            $table->text('terapi_dan_rencana_tindakan');
            $table->text('catatan_perawat')->nullable();
            $table->string('id_petugas')->nullable();
            $table->string('id_perjalanan_penyakit');
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
        Schema::dropIfExists('perintah_dokter_dan_pengobatan');
    }
}
