<?php

namespace App\Http\Controllers;

use App\Models\CategoryProfil;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil_desa',
        ['profil_desa' => ProfilDesa::all(),
        'kategori_profil' => CategoryProfil::all(),
    ]);
    }
}


