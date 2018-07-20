<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHariPerawatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hari_perawatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_ranap');
            $table->date('tanggal');
            $table->integer('hari_perawatan');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
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
        Schema::dropIfExists('hari_perawatan');
    }
}
