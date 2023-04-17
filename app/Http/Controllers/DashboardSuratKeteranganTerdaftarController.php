<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\StatusLayanan;
use App\Models\SuratKeteranganTerdaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class DashboardSuratKeteranganTerdaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            return view('dashboard.layanan.surat_keterangan_terdaftar.index', [
                'surat_keterangan_terdaftar' => SuratKeteranganTerdaftar::latest()->get(),
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
            return view('dashboard.layanan.surat_keterangan_terdaftar.create',[
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
            'kepentingan' => 'required|max:255',
            'letak_tanah' => 'required|max:500',
            'luas_tanah' => 'required|max:255',
            'status_tanah'=> 'required|max:255',
            'batas_utara'=> 'required|max:255',
            'batas_selatan'=> 'required|max:255',
            'batas_timur'=> 'required|max:255',
            'batas_barat'=> 'required|max:255',
            'poto_ktp' => 'image|file|max:1024',
            'poto_kk' => 'image|file|max:1024',
            'poto_sppt' => 'image|file|max:1024'

        ]);
        if($request->file('poto_ktp')){
            $validatedData['poto_ktp'] = $request->file('poto_ktp')->store('layanan-poto_ktp');
        }
        if($request->file('poto_kk')){
            $validatedData['poto_kk'] = $request->file('poto_kk')->store('layanan-poto_kk');
        }
        if($request->file('poto_sppt')){
            $validatedData['poto_sppt'] = $request->file('poto_sppt')->store('layanan-poto_sppt');
        }

        $validatedData['status_layanan_id'] = 1;

        // return $validatedData;

        $store = SuratKeteranganTerdaftar::create($validatedData);

        // return $store;

        if($store){
            return redirect('/dashboard/layanan/surat_keterangan_terdaftar')->with('success','Pengajuan Surat Berhasil!');
        }else{
            return redirect('/dashboard/layanan/surat_keterangan_terdaftar')->with('error','Terjadi kesalaha.');
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
        // $surat_keterangan_usaha = SuratKeteranganTerdaftar::find($id);
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
            $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::find($id);
            return view('dashboard.layanan.surat_keterangan_terdaftar.edit', [
                'skt'=>$surat_keterangan_terdaftar,
                'data_penduduk'=> DataPenduduk::all(),
                'status_layanan' => StatusLayanan::all()
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
        $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::find($id);
        $rules = [
            'data_penduduk_id' => 'required',
            'kepentingan' => 'required|max:255',
            'letak_tanah' => 'required|max:500',
            'luas_tanah' => 'required|max:255',
            'status_tanah'=> 'required|max:255',
            'batas_utara'=> 'required|max:255',
            'batas_selatan'=> 'required|max:255',
            'batas_timur'=> 'required|max:255',
            'batas_barat'=> 'required|max:255',
            'poto_ktp' => 'image|file|max:1024',
            'poto_kk' => 'image|file|max:1024',
            'poto_sppt' => 'image|file|max:1024'
            
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
        if($request->file('poto_sppt')){
            if($request->oldImage3){
                Storage::delete($request->oldImage3);
            }
            $validatedData['poto_sppt'] = $request->file('poto_sppt')->store('layanan-poto_sppt');
        }

        SuratKeteranganTerdaftar::where('id', $surat_keterangan_terdaftar->id)
        ->update($validatedData);

        return redirect('/dashboard/layanan/surat_keterangan_terdaftar')->with('success','Surat Berhasil Diubah');
    }

    public function verifikasi($id)
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::find($id);
            return view('dashboard.layanan.surat_keterangan_terdaftar.verifikasi', [
                'skt'=>$surat_keterangan_terdaftar,
                'data_penduduk'=> DataPenduduk::all(),
                'status_layanan' => StatusLayanan::all()
            ]);
        }else{
                return abort(403);
            }
    }

    public function verifikasi_skt(Request $request, $id)
    {
        $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::find($id);
        $rules = [
            'status_layanan_id' => 'required'
            
        ];

        $validatedData = $request->validate($rules);
        SuratKeteranganTerdaftar::where('id', $surat_keterangan_terdaftar->id)
        ->update($validatedData);

        return redirect('/dashboard/layanan/surat_keterangan_terdaftar')->with('success','Surat Berhasil Diverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::find($id);
        if($surat_keterangan_terdaftar->poto_ktp){
            Storage::delete($surat_keterangan_terdaftar->poto_ktp);
        }
        if($surat_keterangan_terdaftar->poto_kk){
            Storage::delete($surat_keterangan_terdaftar->poto_kk);
        }
        if($surat_keterangan_terdaftar->poto_sppt){
            Storage::delete($surat_keterangan_terdaftar->poto_sppt);
        }
        SuratKeteranganTerdaftar::destroy($surat_keterangan_terdaftar->id);
        return redirect('/dashboard/layanan/surat_keterangan_terdaftar')->with('success', 'Surat berhasil dihapus!');
    }
    public function cetak(){
        $data = [
            'surat_keterangan_terdaftar' => SuratKeteranganTerdaftar::all(),
            'data_penduduk'=> DataPenduduk::all()
        ];
        return view('dashboard.layanan.surat_keterangan_terdaftar.cetak',$data);
    }
    public function cetakpdf(){
        
        $data = [
            'surat_keterangan_terdaftar' => SuratKeteranganTerdaftar::all(),
            'data_penduduk'=> DataPenduduk::all()
        ];
        $html = view('dashboard.layanan.surat_keterangan_terdaftar.cetakpdf',$data);


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
