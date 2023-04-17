<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Gender;
use App\Models\Marriage;
use App\Models\Profession;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;

class DataDesaController extends Controller
{
    public function index()
    {
        $education = DB::table('data_penduduk')
                                ->join('education','education.id','data_penduduk.education_id')
                                ->select('education.pendidikan as pendidikan', DB::raw('count(data_penduduk.education_id) as total'))
                                ->orderBy('education.pendidikan','desc')
                                ->groupBy('education.id')
                                ->get();
        $professions = DB::table('data_penduduk')
                                ->join('professions','professions.id','data_penduduk.professions_id')
                                ->select('professions.kelompok as kelompok', DB::raw('count(data_penduduk.professions_id) as total'))
                                ->orderBy('professions.kelompok','desc')
                                ->groupBy('professions.id')
                                ->get();
        $religions = DB::table('data_penduduk')
                                ->join('religions','religions.id','data_penduduk.religions_id')
                                ->select('religions.agama as agama', DB::raw('count(data_penduduk.religions_id) as total'))
                                ->orderBy('religions.agama','desc')
                                ->groupBy('religions.id')
                                ->get();
        $genders = DB::table('data_penduduk')
                                ->join('genders','genders.id','data_penduduk.religions_id')
                                ->select('genders.jenis as jenis', DB::raw('count(data_penduduk.religions_id) as total'))
                                ->orderBy('genders.jenis','desc')
                                ->groupBy('genders.id')
                                ->get();
        $marriages = DB::table('data_penduduk')
                                ->join('marriages','marriages.id','data_penduduk.religions_id')
                                ->select('marriages.status as status', DB::raw('count(data_penduduk.religions_id) as total'))
                                ->orderBy('marriages.status','desc')
                                ->groupBy('marriages.id')
                                ->get();
                                // dd($marriages);
        return view('data', compact(
            'professions',
            'marriages', 
            'religions',
            'genders',
            'education',
        ));

    }
}
