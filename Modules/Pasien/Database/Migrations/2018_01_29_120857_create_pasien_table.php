<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');

            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('golongan_darah', 2);
            $table->string('alamat');
            $table->string('telepon');
            $table->string('jenkel');
            $table->string('punya_bpjs');

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
        Schema::dropIfExists('pasien');
    }
}
