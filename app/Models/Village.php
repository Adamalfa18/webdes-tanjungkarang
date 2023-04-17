<?php

namespace App\Models;

use App\Models\Potential;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use HasFactory,Sluggable;
    protected $guarded = ['id'];
    protected $with = ['potential'];

    public function potential()
    {
        return $this->belongsTo(Potential::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
