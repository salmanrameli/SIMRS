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
            $table->increments('id');

            $table->string('ktp')->unique();
            $table->string('nama');
            $table->string('jenkel');
            $table->string('nama_wali');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('telepon');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('golongan_darah', 2);

            $table->timestamps();
            $table->softDeletes();
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
