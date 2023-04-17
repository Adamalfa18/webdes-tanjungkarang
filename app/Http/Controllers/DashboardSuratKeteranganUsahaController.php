<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StatusLayanan;
use App\Models\SuratKeteranganUsaha;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardSuratKeteranganUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
        return view('dashboard.layanan.surat_keterangan_usaha.index', [
            'surat_keterangan_usaha' => SuratKeteranganUsaha ::latest()->get(),
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
        return view('dashboard.layanan.surat_keterangan_usaha.create',[
            'data_penduduk'=> DataPenduduk::all(),
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
    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'data_penduduk_id' => 'required',
            'nama_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'alamat_usaha'=> 'required|max:255',
            'kepentingan'=> 'required|max:255',
            'poto_ktp' => 'image|file|max:1024',
            'poto_kk' => 'image|file|max:1024',
            'poto_usaha' => 'image|file|max:1024'

        ]);
        if($request->file('poto_ktp')){
            $validatedData['poto_ktp'] = $request->file('poto_ktp')->store('layanan-poto_ktp');
        }
        if($request->file('poto_kk')){
            $validatedData['poto_kk'] = $request->file('poto_kk')->store('layanan-poto_kk');
        }
        if($request->file('poto_usaha')){
            $validatedData['poto_usaha'] = $request->file('poto_usaha')->store('layanan-poto_usaha');
        }
        $validatedData['status_layanan_id'] = 1;

        // return $validatedData;

        $store = SuratKeteranganUsaha::create($validatedData);

        // return $store;

        if($store){
            return redirect('/dashboard/layanan/surat_keterangan_usaha')->with('success','Pengajuan Surat Berhasil!');
        }else{
            return redirect('/dashboard/layanan/surat_keterangan_usaha')->with('error','Terjadi kesalaha.');
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
        // $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        // return view('dashboard.layanan.surat_keterangan_usaha.show', [
        //     'sku'=>$surat_keterangan_usaha
        // ]);
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
        $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        return view('dashboard.layanan.surat_keterangan_usaha.edit', [
            'sku'=>$surat_keterangan_usaha,
            'data_penduduk'=> DataPenduduk::all()
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
        $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        $rules = [
            'data_penduduk_id' => 'required',
            'nama_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'alamat_usaha'=> 'required|max:255',
            'kepentingan'=> 'required|max:255',
            'poto_ktp' => 'image|file|max:1024',
            'poto_kk' => 'image|file|max:1024',
            'poto_usaha' => 'image|file|max:1024'
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
        if($request->file('poto_usaha')){
            if($request->oldImage3){
                Storage::delete($request->oldImage3);
            }
            $validatedData['poto_usaha'] = $request->file('poto_usaha')->store('layanan-poto_usaha');
        }

        SuratKeteranganUsaha::where('id', $surat_keterangan_usaha->id)
        ->update($validatedData);

        return redirect('/dashboard/layanan/surat_keterangan_usaha')->with('success','Surat Berhasil Diubah!');
    }


    public function verifikasi($id)
    {
        $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        return view('dashboard.layanan.surat_keterangan_usaha.verifikasi', [
            'sku'=>$surat_keterangan_usaha,
            'data_penduduk'=> DataPenduduk::all(),
            'status_layanan' => StatusLayanan::all()
        ]);
    }
    public function verifikasi_sku(Request $request, $id){
        $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        $rules = [
            'status_layanan_id' => 'required'
        ];

        $validatedData = $request->validate($rules);
        SuratKeteranganUsaha::where('id', $surat_keterangan_usaha->id)
        ->update($validatedData);

        return redirect('/dashboard/layanan/surat_keterangan_usaha')->with('success','Surat Berhasil Diverifikasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        if($surat_keterangan_usaha->poto_ktp){
            Storage::delete($surat_keterangan_usaha->poto_ktp);
        }
        if($surat_keterangan_usaha->poto_kk){
            Storage::delete($surat_keterangan_usaha->poto_kk);
        }
        if($surat_keterangan_usaha->poto_usaha){
            Storage::delete($surat_keterangan_usaha->poto_usaha);
        }
        SuratKeteranganUsaha::destroy($surat_keterangan_usaha->id);
        return redirect('/dashboard/layanan/surat_keterangan_usaha')->with('success', 'Surat Berhasil Dihapus');
    }

    public function cetak(){
        
        return view('dashboard.layanan.surat_keterangan_usaha.cetak', [
            'surat_keterangan_usaha' => SuratKeteranganUsaha ::all(),
            'data_penduduk'=> DataPenduduk::all()
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
        // $data = [
        //     'surat_keterangan_usaha' => SuratKeteranganUsaha ::all()
        // ];
        // return view('dashboard.layanan.surat_keterangan_usaha.cetak',$data);
    }


    public function cetak_surat($id){
        $surat_keterangan_usaha = SuratKeteranganUsaha::find($id);
        return view('dashboard.layanan.surat_keterangan_usaha.cetak_surat', [
            'sku'=>$surat_keterangan_usaha,
            'data_penduduk' => DataPenduduk::all()
        ]);
    }


    public function cetakpdf(){
        
        $data = [
            'surat_keterangan_usaha' => SuratKeteranganUsaha ::all(),
            'data_penduduk'=> DataPenduduk::all()
        ];
        $html = view('dashboard.layanan.surat_keterangan_usaha.cetakpdf',$data);


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
