<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['warganegara'];
    protected $table = 'data_penduduk';
    
    public function surat_keterangan_usaha(){
        return $this->hasMany(SuratKeteranganUsaha::class);
    }
    public function surat_keterangan_terdaftar(){
        return $this->hasMany(SuratKeteranganTerdaftar::class);
    }
    public function education(){
        return $this->belongsTo(Education::class);
    }
    public function professions(){
        return $this->belongsTo(Profession::class);
    }
    public function religions(){
        return $this->belongsTo(Religion::class);
    }
    public function marriages(){
        return $this->belongsTo(Marriage::class);
    }
    public function genders(){
        return $this->belongsTo(Gender::class);
    }
    public function warganegara(){
        return $this->belongsTo(Warganegara::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
