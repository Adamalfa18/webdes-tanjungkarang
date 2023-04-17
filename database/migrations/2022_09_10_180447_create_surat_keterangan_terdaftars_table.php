<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganTerdaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_terdaftar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_penduduk_id');
            $table->foreignId('status_layanan_id')->nullable();
            $table->string('kepentingan');
            $table->string('letak_tanah');
            $table->string('luas_tanah');
            $table->string('status_tanah');
            $table->string('batas_utara');
            $table->string('batas_selatan');
            $table->string('batas_timur');
            $table->string('batas_barat');
            $table->string('poto_ktp')->nullable();
            $table->string('poto_kk')->nullable();
            $table->string('poto_sppt')->nullable();
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
        Schema::dropIfExists('surat_keterangan_terdaftar');
    }
}
