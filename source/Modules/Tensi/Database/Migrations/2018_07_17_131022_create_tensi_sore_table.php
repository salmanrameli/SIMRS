<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTensiSoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tensi_sore', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hari_perawatan');
            $table->integer('tensi_atas');
            $table->integer('tensi_bawah');
            $table->integer('id_petugas');
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
        Schema::dropIfExists('tensi_sore');
    }
}
