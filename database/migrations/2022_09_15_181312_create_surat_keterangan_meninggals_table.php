<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganMeninggalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_meninggal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_penduduk_id');
            $table->foreignId('status_layanan_id')->nullable();
            $table->string('nama_alm');
            $table->string('nik_alm');
            $table->string('jenis_kelamin_alm');
            $table->date('tanggal_lahir_alm');
            $table->string('warganegara_alm');
            $table->string('agama_alm');
            $table->string('status_pernikahan_alm');
            $table->string('pekerjaan_alm');
            $table->string('alamat_alm');
            $table->date('tanggal_meninggal');
            $table->string('tempat_meninggal');
            $table->string('sebab_meninggal');
            $table->string('jam_meninggal');
            $table->string('poto_ktp')->nullable();
            $table->string('poto_kk')->nullable();
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
        Schema::dropIfExists('surat_keterangan_meninggal');
    }
}
