<?php
namespace App\Http\Controllers;

use App\Models\LayananMandiri;

class DashboardLayananController extends Controller
{
    public function index()
    {
        return view('dashboard.layanan.index', [
            'layanan' => LayananMandiri::all()
        ]);
    }
}
