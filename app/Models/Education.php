<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'education';

    public function data_penduduk(){
        return $this->hasMany(DataPenduduk::class);
    }
}
