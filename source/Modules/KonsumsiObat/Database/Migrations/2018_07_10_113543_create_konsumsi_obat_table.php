<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumsiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumsi_obat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_ranap');
            $table->integer('id_hari_perawatan');
            $table->integer('id_obat');
            $table->integer('dosis');
            $table->string('id_petugas');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('konsumsi_obat');
    }
}
