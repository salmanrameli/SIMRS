<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap', function (Blueprint $table) {
            $table->increments('id');

            $table->string('id_rm');
            $table->string('id_pasien');
            $table->date('tanggal_masuk');
            $table->text('alergi_obat')->nullable();

            $table->string('estimasi_biaya');
            $table->string('pembayaran');
            $table->string('jaminan')->nullable();
            $table->string('nama_penanggungjawab_pembayaran');
            $table->string('alamat_penanggungjawab_pembayaran');
            $table->string('telepon_penanggungjawab_pembayaran');
            $table->string('hubungan_penanggungjawab');

            $table->string('dokter_pengirim')->nullable();
            $table->string('id_petugas_penerima');
            $table->string('diagnosa_awal')->nullable();
            $table->string('icd_x_diagnosa_awal')->nullable();
            $table->string('id_dokter_pj');
            $table->string('diagnosa_sekunder')->nullable();
            $table->string('icd_x_diagnosa_sekunder')->nullable();
            $table->string('nama_kamar');

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
        Schema::dropIfExists('rawat_inap');
    }
}
