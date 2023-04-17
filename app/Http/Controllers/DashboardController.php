<?php

namespace App\Http\Controllers;

use App\Models\MadingDesa;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            $data['mading_desa'] = MadingDesa::all();
            $data['pengaduan'] = Pengaduan::all();
            return view('dashboard.index', $data);
        }else{
            return abort(403);
        }
    }
    
    public function cetak(){
        
        $data = [
            'pengaduan' => Pengaduan ::all()
        ];
        return view('dashboard.pengaduan.cetak',$data);
    }
    public function cetakpdf(){
        
        $data = [
            'pengaduan' => Pengaduan ::all()
        ];
        $html = view('dashboard.pengaduan.cetakpdf',$data);


        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    public function destroy($id)
    {

        $pengaduan = Pengaduan::find($id);
        Pengaduan::destroy($pengaduan->id);
        return redirect('dashboard/')->with('success', 'Data Berhail Dihapus!');
    }
}