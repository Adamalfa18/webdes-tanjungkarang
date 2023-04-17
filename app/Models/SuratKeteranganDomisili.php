<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganDomisili extends Model
{
    use HasFactory;
    protected $table = 'surat_keterangan_domisili';
    protected $guarded = ['id'];

    public function status_layanan(){
        return $this->belongsTo(StatusLayanan::class);
    }
    public function data_penduduk(){
        return $this->belongsTo(DataPenduduk::class);
    }
}
