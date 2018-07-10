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
            $table->date('tanggal');
            $table->string('hari_perawatan');
            $table->string('id_obat');
            $table->string('dosis');
            $table->string('waktu');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
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
