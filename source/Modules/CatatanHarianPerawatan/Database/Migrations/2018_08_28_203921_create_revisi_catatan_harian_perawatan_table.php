<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisiCatatanHarianPerawatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_catatan_harian_perawatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_catatan_harian_perawatan');
            $table->text('asuhan_keperawatan_soap');
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
        Schema::dropIfExists('revisi_catatan_harian_perawatan');
    }
}
