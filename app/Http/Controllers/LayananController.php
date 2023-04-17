<?php


namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\LayananMandiri;
use App\Models\SuratKeteranganBelumMenikah;
use App\Models\SuratKeteranganDomisili;
use App\Models\SuratKeteranganMeninggal;
use App\Models\SuratKeteranganPindah;
use App\Models\SuratKeteranganTerdaftar;
use App\Models\SuratKeteranganTidakMampu;
use App\Models\SuratKeteranganUsaha;
use Illuminate\Http\Request;

class LayananController extends Controller
{
public function index()
    {
        return view('layanan.index', [
            'layanan' => LayananMandiri::all()
        ]);
    }
    public function sku()
    {
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
        $surat_keterangan_usaha = SuratKeteranganUsaha::where('data_penduduk_id',$data_penduduk->id)->get();
        return view('layanan.surat.sku.sku', compact('surat_keterangan_usaha','data_penduduk'));
    }
    public function create_sku(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_usaha = SuratKeteranganUsaha::all();
        return view('layanan.surat.sku.create', compact('surat_keterangan_usaha','data_penduduk'));
    }
    public function sku_create(Request $request){
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
        $validatedData['user_id'] = auth()->user()->id;
        
        $validatedData['status_layanan_id'] = 1;

        // return $validatedData;

        SuratKeteranganUsaha::create($validatedData);
        return redirect('layanan/surat/surat_keterangan_usaha')->with('success','Pengajuan Suarat Berhasil!');
    }
    public function skt(){
            $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
            $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::where('data_penduduk_id',$data_penduduk->id)->get();
            return view('layanan.surat.skt.skt', compact('surat_keterangan_terdaftar','data_penduduk'));
    }
    public function create_skt(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_terdaftar = SuratKeteranganTerdaftar::all();
        return view('layanan.surat.skt.create', compact('surat_keterangan_terdaftar','data_penduduk'));
    }
    public function skt_create(Request $request){
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
            return redirect('layanan/surat/surat_keterangan_terdaftar')->with('success','Pengajuan Suarat Berhasil!');
        }else{
            return redirect('layanan/surat/surat_keterangan_terdaftar')->with('error','Terjadi kesalaha.');
        }

        
    }
    public function skd(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
        $surat_keterangan_domisili = SuratKeteranganDomisili::where('data_penduduk_id',$data_penduduk->id)->get();
        return view('layanan.surat.skd.skd', compact('surat_keterangan_domisili','data_penduduk'));
        }
    public function create_skd(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_domisili = SuratKeteranganDomisili::all();
        return view('layanan.surat.skd.create', compact('surat_keterangan_domisili','data_penduduk'));
        }
    public function skd_create(Request $request){
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

        $store = SuratKeteranganDomisili::create($validatedData);

        // return $store;

        if($store){
            return redirect('layanan/surat/surat_keterangan_domisili')->with('success','Pengajuan Suarat Berhasil!');
        }else{
            return redirect('layanan/surat/surat_keterangan_domisili')->with('error','Terjadi kesalaha.');
        }
    }
    public function skp(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
        $surat_keterangan_pindah = SuratKeteranganPindah::where('data_penduduk_id',$data_penduduk->id)->get();
        return view('layanan.surat.skp.skp', compact('surat_keterangan_pindah','data_penduduk'));
        }
    public function create_skp(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_pindah = SuratKeteranganPindah::all();
        return view('layanan.surat.skp.create', compact('surat_keterangan_pindah','data_penduduk'));
        }
    public function skp_create(Request $request){
        $validatedData = $request->validate([
            'data_penduduk_id' => 'required',
            'alamat_pindah' => 'required|max:255',
            'alasan_pindah' => 'required|max:500',
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

        $store = SuratKeteranganPindah::create($validatedData);

        // return $store;

        if($store){
            return redirect('layanan/surat/surat_keterangan_pindah')->with('success','Pengajuan Suarat Berhasil!');
        }else{
            return redirect('layanan/surat/surat_keterangan_pindah')->with('error','Terjadi kesalaha.');
        }
    }
    public function sktm(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
        $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::where('data_penduduk_id',$data_penduduk->id)->get();
        return view('layanan.surat.sktm.sktm', compact('surat_keterangan_tidak_mampu','data_penduduk'));
        }
    public function create_sktm(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_tidak_mampu = SuratKeteranganTidakMampu::all();
        return view('layanan.surat.sktm.create', compact('surat_keterangan_tidak_mampu','data_penduduk'));
        }
    public function sktm_create(Request $request){
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
            return redirect('layanan/surat/surat_keterangan_tidak_mampu')->with('success','Pengajuan Suarat Berhasil!');
        }else{
            return redirect('layanan/surat/surat_keterangan_tidak_mampu')->with('error','Terjadi kesalaha.');
        }
    }
    public function skm(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
        $surat_keterangan_meninggal = SuratKeteranganMeninggal::where('data_penduduk_id',$data_penduduk->id)->get();
        return view('layanan.surat.skm.skm', compact('surat_keterangan_meninggal','data_penduduk'));
        }
    public function create_skm(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_meninggal = SuratKeteranganMeninggal::all();
        return view('layanan.surat.skm.create', compact('surat_keterangan_meninggal','data_penduduk'));
        }
    public function skm_create(Request $request){
        $validatedData = $request->validate([
            'data_penduduk_id' => 'required',
            'nama_alm' => 'required|max:255',
            'nik_alm' => 'required|max:255',
            'jenis_kelamin_alm' => 'required|max:500',
            'tanggal_lahir_alm' => 'required',
            'warganegara_alm' => 'required|max:255',
            'agama_alm' => 'required|max:255',
            'status_pernikahan_alm' => 'required|max:255',
            'pekerjaan_alm' => 'required|max:255',
            'alamat_alm' => 'required|max:255',
            'tanggal_meninggal' => 'required|max:255',
            'tempat_meninggal' => 'required|max:255',
            'sebab_meninggal' => 'required|max:255',
            'jam_meninggal' => 'required|max:255',
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

        $store = SuratKeteranganMeninggal::create($validatedData);

        // return $store;

        if($store){
            return redirect('layanan/surat/surat_keterangan_meninggal')->with('success','Pengajuan Berhasil Berhasil!');
        }else{
            return redirect('layanan/surat/surat_keterangan_meninggal')->with('error','Terjadi kesalaha.');
        }
    }
    public function skbm(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->first('id');
        $surat_keterangan_belum_menikah = SuratKeteranganBelumMenikah::where('data_penduduk_id',$data_penduduk->id)->get();
        return view('layanan.surat.skbm.skbm', compact('surat_keterangan_belum_menikah','data_penduduk'));
        }
    public function create_skbm(){
        $data_penduduk = DataPenduduk::where('user_id', auth()->user()->id)->get();
        $surat_keterangan_belum_menikah = SuratKeteranganBelumMenikah::all();
        return view('layanan.surat.skbm.create', compact('surat_keterangan_belum_menikah','data_penduduk'));
        }
    public function skbm_create(Request $request){
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

        $store = SuratKeteranganBelumMenikah::create($validatedData);

        // return $store;

        if($store){
            return redirect('layanan/surat/surat_keterangan_belum_menikah')->with('success','Pengajuan Suarat Berhasil!');
        }else{
            return redirect('layanan/surat/surat_keterangan_belum_menikah')->with('error','Terjadi kesalaha.');
        }
    }
}