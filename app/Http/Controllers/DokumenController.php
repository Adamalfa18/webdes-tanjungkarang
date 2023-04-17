<?php
namespace App\Http\Controllers;

use App\Models\DataPdf;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dokumen', [
            'data_pdf' => DataPdf::all()
        ]);
    }
}