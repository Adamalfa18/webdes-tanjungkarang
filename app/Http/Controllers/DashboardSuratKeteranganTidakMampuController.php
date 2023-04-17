<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\StatusLayanan;
use App\Models\SuratKeteranganTidakMampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class DashboardSuratKeteranganTidakMampuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            return view('dashboard.layanan.surat_keterangan_tidak_mampu.index', [
                'surat_keterangan_tidak_mampu' => SuratKeteranganTidakMampu::latest()->get(),
                'data_penduduk'=> DataPenduduk::all()
                // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            ]);
        }else{
                return abort(403);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            return view('dashboard.layanan.surat_keterangan_tidak_mampu.create',[
                'data_penduduk'=> DataPenduduk::all()
            ]);
        }else{
                return abort(403);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data_penduduk_id' => 'required',
            'prihal' => 'required|max:500',
            'poto_ktp' => 'image|file|max:1024',
            'poto_kk' => 'image|file|max:1024',

        ]);
        if($request->file('poto_ktp')){
            $validatedData['poto_ktp'] = $request->file('poto_ktp')->store('layanan-poto_ktp');
        }
        if($request->file('poto_kk')){
            $validatedData['poto_kk'] = $request->file('poto_kk')->store('layanan-poto_kk');
        }
        
        $validatedData['status_layanan_id'] = 1;

        // return $validatedData;

        $store = SuratKeteranganTidakMampu::create($validatedData);

        // return $store;

        if($store){
            return redirect('/dashboard/layanan/surat_keterangan_tidak_mampu')->with('success','Pengajuan Surat Berhasil!');
        }else{
            return redirect('/dashboard/layanan/surat_keterangan_tidak_mampu')->with('error','Terjadi kesalaha.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::find($id);
            return view('dashboard.layanan.surat_keterangan_tidak_mampu.edit', [
                'sktm'=>$surat_keterangan_tidak_mampu,
                'status_layanan' => StatusLayanan::all(),
                'data_penduduk' => DataPenduduk::all()
            ]);
        }else{
                return abort(403);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::find($id);
        $rules = [
            'data_penduduk_id' => 'required',
            'prihal' => 'required|max:500',
            'poto_ktp' => 'image|file|max:1024',
            'poto_kk' => 'image|file|max:1024',
            
        ];

        $validatedData = $request->validate($rules);

        if($request->file('poto_ktp')){
            if($request->oldImage1){
                        Storage::delete($request->oldImage1);
                    }
            $validatedData['poto_ktp'] = $request->file('poto_ktp')->store('layanan-poto_ktp');
        }
        if($request->file('poto_kk')){
            if($request->oldImage2){
                        Storage::delete($request->oldImage2);
                    }
            $validatedData['poto_kk'] = $request->file('poto_kk')->store('layanan-poto_kk');
        }

        SuratKeteranganTidakMampu::where('id', $surat_keterangan_tidak_mampu->id)
        ->update($validatedData);

        return redirect('/dashboard/layanan/surat_keterangan_tidak_mampu')->with('success','Surat Berhasil Diubah!');

    }


    public function verifikasi($id)
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::find($id);
            return view('dashboard.layanan.surat_keterangan_tidak_mampu.verifikasi', [
                'sktm'=>$surat_keterangan_tidak_mampu,
                'status_layanan' => StatusLayanan::all()
            ]);
        }else{
                return abort(403);
            }
    }

    public function verifikasi_sktm(Request $request, $id)
    {
        $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::find($id);
        $rules = [
            'status_layanan_id' => 'required'
        ];

        $validatedData = $request->validate($rules);
        SuratKeteranganTidakMampu::where('id', $surat_keterangan_tidak_mampu->id)
        ->update($validatedData);

        return redirect('/dashboard/layanan/surat_keterangan_tidak_mampu')->with('success','Surat Berhasil Diverifikasi!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::find($id);
        if($surat_keterangan_tidak_mampu->poto_ktp){
            Storage::delete($surat_keterangan_tidak_mampu->poto_ktp);
        }
        if($surat_keterangan_tidak_mampu->poto_kk){
            Storage::delete($surat_keterangan_tidak_mampu->poto_kk);
        }
        SuratKeteranganTidakMampu::destroy($surat_keterangan_tidak_mampu->id);
        return redirect('/dashboard/layanan/surat_keterangan_tidak_mampu')->with('success', 'Surat berhasil dihapus!');
    }
    public function cetak_surat($id){
        $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::find($id);
        return view('dashboard.layanan.surat_keterangan_tidak_mampu.cetak_surat', [
            'sktm'=>$surat_keterangan_tidak_mampu,
            'data_penduduk' => DataPenduduk::all()
        ]);
    }
    public function cetak(){
        $data = [
            'surat_keterangan_tidak_mampu' => SuratKeteranganTidakMampu::all()
        ];
        return view('dashboard.layanan.surat_keterangan_tidak_mampu.cetak',$data);
    }
    public function cetakpdf(){
        
        $data = [
            'surat_keterangan_tidak_mampu' => SuratKeteranganTidakMampu::all()
        ];
        $html = view('dashboard.layanan.surat_keterangan_tidak_mampu.cetakpdf',$data);


        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
