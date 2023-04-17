<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPdf extends Model
{
    use HasFactory;
    protected $table = 'data_pdf';
    protected $guarded = ['id'];
}
