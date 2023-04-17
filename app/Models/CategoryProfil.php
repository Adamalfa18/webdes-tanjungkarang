<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProfil extends Model
{
    use HasFactory,Sluggable;
    protected $guarded = ['id'];
    protected $table = 'category_profil';

    public function profil()
    {
        return $this->hasMany(ProfilDesa::class);
    }
 
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
    
}
