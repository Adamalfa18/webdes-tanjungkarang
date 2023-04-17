<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('nama');
            $table->string('no_kk');
            $table->string('no_hp');
            $table->date('tanggal_lahir');
            $table->string('nik')->unique();
            $table->foreignId('user_id')->unique();
            $table->foreignId('religions_id');
            $table->foreignId('education_id');
            $table->foreignId('professions_id');
            $table->foreignId('marriages_id');
            $table->foreignId('genders_id');
            $table->foreignId('warganegara_id');
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
        Schema::dropIfExists('data_penduduk');
    }
}
