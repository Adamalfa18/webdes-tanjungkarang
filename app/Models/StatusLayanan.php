<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusLayanan extends Model
{
    use HasFactory;
    protected $table = 'status_layanan';
    protected $guarded = ['id'];

    
    public function surat_keterangan_usaha(){
        return $this->hasMany(SuratKeteranganUsaha::class);
    }

    public function surat_keterangan_terdaftar(){
        return $this->hasMany(SuratKeteranganTerdaftar::class);
    }

    public function surat_keterangan_domisili(){
        return $this->hasMany(SuratKeteranganDomisili::class);
    }
    public function surat_keterangan_pindah(){
        return $this->hasMany(SuratKeteranganPindah::class);
    }
    public function surat_keterangan_tidak_mampu(){
        return $this->hasMany(SuratKeteranganTidakMampu::class);
    }
    public function surat_keterangan_meninggal(){
        return $this->hasMany(SuratKeteranganMeninggal::class);
    }
    public function surat_keterangan_belum_menikah(){
        return $this->hasMany(SuratKeteranganBelumMenikah::class);
    }

}
