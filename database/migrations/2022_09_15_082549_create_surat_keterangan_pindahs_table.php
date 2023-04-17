<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganPindahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_pindah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_penduduk_id');
            $table->foreignId('status_layanan_id')->nullable();
            $table->string('alamat_pindah');
            $table->string('alasan_pindah');
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
        Schema::dropIfExists('surat_keterangan_pindah');
    }
}
