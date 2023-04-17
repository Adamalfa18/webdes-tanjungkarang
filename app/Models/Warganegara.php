<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warganegara extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'warganegara';

    public function penduduk()
    {
        return $this->hasMany(DataPenduduk::class);
    }
}
