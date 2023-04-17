<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'profil_desa';

    public function category_profil()
    {
        return $this->belongsTo(CategoryProfil::class);
    }
}
