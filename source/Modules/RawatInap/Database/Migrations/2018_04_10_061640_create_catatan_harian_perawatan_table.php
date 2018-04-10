<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatatanHarianPerawatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_harian_perawatan', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_keterangan');
            $table->integer('jam');
            $table->text('asuhan_keperawatan_soap');
            $table->string('id_petugas');

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
        Schema::dropIfExists('catatan_harian_perawatan');
    }
}
