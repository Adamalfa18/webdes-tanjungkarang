<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Program;
use App\Models\Category;

use App\Models\Programs;
use App\Models\AssistanceProgram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\DashboardDocController;
use App\Http\Controllers\LoginLayananController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SuratIzinUsahaController;
use App\Http\Controllers\DashboardGenderController;
use App\Http\Controllers\DashboardMadingController;
use App\Http\Controllers\SuratTidakMampuController;
use App\Http\Controllers\DashboardDataPdfController;
use App\Http\Controllers\DashboardFinanceController;
use App\Http\Controllers\DashboardLayananController;
use App\Http\Controllers\DashboardProgramController;
use App\Http\Controllers\DashboardVillageController;
use App\Http\Controllers\AdminPegawaiLoginController;
use App\Http\Controllers\DashboardAparaturController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardDataDesaController;
use App\Http\Controllers\DashboardMarriageController;
use App\Http\Controllers\DashboardPendudukController;
use App\Http\Controllers\DashboardProgramsController;
use App\Http\Controllers\DashboardReligionController;
use App\Http\Controllers\DashboardEducationController;
use App\Http\Controllers\SuratIzinKeramaianController;
use App\Http\Controllers\DashboardAssistanceController;
use App\Http\Controllers\DashboardKelolaUserController;
use App\Http\Controllers\DashboardProfessionController;
use App\Http\Controllers\DashboardProfilDesaController;
use App\Http\Controllers\SuratKeteranganUsahaController;
use App\Http\Controllers\DashboardDataPendudukController;
use App\Http\Controllers\DashboardDokumenSuratController;
use App\Http\Controllers\DashboardCategoriProfilController;
use App\Http\Controllers\DashboardSuratIzinUsahaController;
use App\Http\Controllers\SuratKeteranganTidakMampuController;
use App\Http\Controllers\DashboardSuratIzinKeramaianController;
use App\Http\Controllers\DashboardSuratKeteranganUsahaController;
use App\Http\Controllers\DashboardSuratKeteranganPindahController;
use App\Http\Controllers\DashboardSuratKeteranganDomisiliController;
use App\Http\Controllers\DashboardSuratKeteranganMeninggalController;
use App\Http\Controllers\DashboardSuratKeteranganTerdaftarController;
use App\Http\Controllers\DashboardSuratKeteranganTidakMampuController;
use App\Http\Controllers\DashboardSuratKeteranganBelumMenikahController;
use App\Models\Profession;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home',[
//         "title" => "Post",
//     ]);
// });

// if (Auth::check()) {
    //     if (Auth::user()->user_role_id !== 3) {
Route::get('/layanan', [LayananController::class,'index'])->middleware('auth');
// Route::get('/layanan/surat', KematianController ::class);


// surat Izin Usaha
Route::get('layanan/surat/surat_keterangan_usaha', [LayananController::class,'sku'])->middleware('auth');
Route::get('/create/sku', [LayananController::class,'create_sku'])->middleware('auth');
Route::post('surat_keterangan_usaha', [LayananController::class,'sku_create'])->middleware('auth');

// Surat Keterangan Terdaftar
Route::get('layanan/surat/surat_keterangan_terdaftar', [LayananController::class,'skt'])->middleware('auth');
Route::get('/create/skt', [LayananController::class,'create_skt'])->middleware('auth');
Route::post('surat_keterangan_terdaftar', [LayananController::class,'skt_create'])->middleware('auth');

//surat keterangan domisisli
Route::get('layanan/surat/surat_keterangan_domisili', [LayananController::class,'skd'])->middleware('auth');
Route::get('/create/skd', [LayananController::class,'create_skd'])->middleware('auth');
Route::post('surat_keterangan_domisili', [LayananController::class,'skd_create'])->middleware('auth');

//surat keterangan pindah
Route::get('layanan/surat/surat_keterangan_pindah', [LayananController::class,'skp'])->middleware('auth');
Route::get('/create/skp', [LayananController::class,'create_skp'])->middleware('auth');
Route::post('surat_keterangan_pindah', [LayananController::class,'skp_create'])->middleware('auth');

//surat keterangan tidak mampu
Route::get('layanan/surat/surat_keterangan_tidak_mampu', [LayananController::class,'sktm'])->middleware('auth');
Route::get('/create/sktm', [LayananController::class,'create_sktm'])->middleware('auth');
Route::post('surat_keterangan_tidak_mampu', [LayananController::class,'sktm_create'])->middleware('auth');

//surat keterangan meninggal
Route::get('layanan/surat/surat_keterangan_meninggal', [LayananController::class,'skm'])->middleware('auth');
Route::get('/create/skm', [LayananController::class,'create_skm'])->middleware('auth');
Route::post('surat_keterangan_meninggal', [LayananController::class,'skm_create'])->middleware('auth');

//surat keterangan belum nikah
Route::get('layanan/surat/surat_keterangan_belum_menikah', [LayananController::class,'skbm'])->middleware('auth');
Route::get('/create/skbm', [LayananController::class,'create_skbm'])->middleware('auth');
Route::post('surat_keterangan_belum_menikah', [LayananController::class,'skbm_create'])->middleware('auth');


Route::get('/',[PostController::class, 'berita']);
Route::get('/berita', [PostController::class, 'index']);
Route::get('/berita/{post:slug}', [PostController::class, 'show']);

//dokumen desa
Route::get('/dokumen', [DokumenController::class, 'index']);

Route::post('/pengaduan',[PostController::class, 'pengaduan']);

// Route::get('/',[ProfilController::class, 'index']);
Route::get('/profil', [ProfilController::class,'index']);

Route::get('/profil/sejarah', function () {
    return view('profil.sejarah_desa');
});
Route::get('/profil/peta_desa', function () {
    return view('profil.peta_desa');
});
Route::get('/profil/visi_misi', function () {
    return view('profil.visi');
});
Route::get('/profil/struktur_organisasi', function () {
    return view('profil.struktur_organisasi');
});

// Route::get('/data/pekerjaan', [ProfessionController::class, 'index']);
// Route::get('/data/pendidikan', [EducationController::class, 'index']);
// Route::get('/data/agama', [ReligionController::class, 'index']);
// Route::get('/data/jenis', [GenderController::class, 'index']);
// Route::get('/data/perkawinan', [MarriageController::class, 'index']);

Route::get('/data', [DataDesaController::class, 'index']);
// Route::get('/data/pekerjaan', [DataDesaController::class, 'pekerjaan']);
// Route::get('/data/agama', [DataDesaController::class, 'agama']);
// Route::get('/data', [DataDesaController::class, 'jenisKelamin']);
// Route::get('/data', [DataDesaController::class, 'perkawinan']);

Route::get('/coba', function () {
    return view('coba');
});


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        "posts" => $category->posts,
        'category' => $category->name
    ]);
});

// Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('guest');
// Route::post('/admin', [AdminController::class, 'authenticate']);
// Route::post('/logout', [AdminController::class, 'logout']);

//login admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/layanan/ubah_password/{user:id}/edit', [LoginController::class,'edit_password']);
Route::post('/layanan/ubah_password/{user:id}', [LoginController::class,'update_password']);

Route::post('/logout', [LoginController::class, 'logout']);

//login Layanan
Route::get('/login_layanan', [LoginController::class, 'user'])->name('login')->middleware('guest');
Route::post('/login_layanan', [LoginController::class, 'layanan']);
// Route::post('/login_layanan', [LoginLayananController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// Route::post('/register', [RegisterController::class, 'daftar']);

//login menunggu konfirmasi
Route::get('/verifikasi_akun', [LoginController::class,'index_verifikasi']);


Route::middleware(['auth'])->group(function(){
    
    // if (Auth::check()) {
    //     if (Auth::user()->user_role_id !== 3) {

        
            Route::resource('/dashboard/data/professions', DashboardProfessionController::class);
            Route::resource('/dashboard/data/educations', DashboardEducationController::class);
            Route::resource('/dashboard/data/religions', DashboardReligionController::class);
            Route::resource('/dashboard/data/genders', DashboardGenderController::class);
            Route::resource('/dashboard/data/marriages', DashboardMarriageController::class);

            Route::get('/dashboard/surat', function () {
                return view('dashboard.surat');
            });
        
            
            // Route::get('generate-docx', 'DashboardDocController@generateDocx');
            
            Route::get('generate-docx', [DashboardDocController::class, 'generateDocx']);
            
            // Berita Desa
            Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
            Route::resource('/dashboard/posts', DashboardPostController::class);
            
            // Data Desa
            // Route::get('/dashboard/data/desa', function () {
            //     return view('dashboard.data.index');
            // });
            
            Route::resource('/dashboard/data-penduduk', DashboardDataPendudukController::class);
            
            
            
            Route::resource('/dashboard/data', DashboardPendudukController::class);
            
            // Keuangan Desa
            Route::resource('/dashboard/finances', DashboardFinanceController::class);
            
            //program batuan//
            Route::resource('/dashboard/programs/assistances', DashboardAssistanceController::class);
            Route::resource('/dashboard/programs', DashboardProgramsController::class);
            Route::get('/dashboard/programs/program/{program:id}', function (Program $program) {
                return view('dashboard.programs.program', [
                    'title' => $program->name,
                    "assistances" => $program->assistances,
                    'program' => $program->name
                ]);
            });
            
            // Potensi Desa
            Route::get('/dashboard/villages/checkSlug', [DashboardVillageController::class, 'checkSlug']);
            Route::resource('/dashboard/villages', DashboardVillageController::class);
            
            // Category
            Route::get('/dashboard/category/checkSlug', [DashboardCategoryController::class, 'checkSlug']);
            Route::resource('/dashboard/category', DashboardCategoryController::class);
            
            // Aparatur Desa
            Route::resource('/dashboard/aparatur', DashboardAparaturController::class);

            //file pdf
            Route::resource('/dashboard/data_pdf', DashboardDataPdfController::class);

            Route::resource('/dashboard/dokumen_surat', DashboardDokumenSuratController::class);
            
            
            // Layanan Mandiri
            Route::get('/dashboard/layanan', [DashboardLayananController::class,'index']);

            //keterangan Usaha
            Route::resource('/dashboard/layanan/surat_keterangan_usaha', DashboardSuratKeteranganUsahaController::class);
            Route::get('/dashboard/layanan/surat_keterangan_usaha/{sku:id}/verifikasi', [DashboardSuratKeteranganUsahaController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_usaha/{sku:id}', [DashboardSuratKeteranganUsahaController::class,'verifikasi_sku']);
            Route::get('/dashboard/layanan/sku/cetak', [DashboardSuratKeteranganUsahaController::class,'cetak']);
            Route::get('/dashboard/layanan/sku/cetakpdf', [DashboardSuratKeteranganUsahaController::class,'cetakpdf']);
            Route::get('/dashboard/layanan/surat_keterangan_usaha/{sku:id}/cetak-surat', [DashboardSuratKeteranganUsahaController::class,'cetak_surat']);
            
            //surat keterangan terdaftar
            Route::resource('/dashboard/layanan/surat_keterangan_terdaftar', DashboardSuratKeteranganTerdaftarController::class);
            Route::get('/dashboard/layanan/surat_keterangan_terdaftar/{skt:id}/verifikasi', [DashboardSuratKeteranganTerdaftarController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_terdaftar/{skt:id}', [DashboardSuratKeteranganTerdaftarController::class,'verifikasi_skt']);
            Route::get('/dashboard/layanan/skt/cetak', [DashboardSuratKeteranganTerdaftarController::class,'cetak']);
            Route::get('/dashboard/layanan/skt/cetakpdf', [DashboardSuratKeteranganTerdaftarController::class,'cetakpdf']);

            //surat keterangan domisili
            Route::resource('/dashboard/layanan/surat_keterangan_domisili', DashboardSuratKeteranganDomisiliController::class);
            Route::get('/dashboard/layanan/surat_keterangan_domisili/{skd:id}/verifikasi', [DashboardSuratKeteranganDomisiliController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_domisili/{skd:id}', [DashboardSuratKeteranganDomisiliController::class,'verifikasi_skd']);
            Route::get('/dashboard/layanan/skd/cetak', [DashboardSuratKeteranganDomisiliController::class,'cetak']);
            Route::get('/dashboard/layanan/skd/cetakpdf', [DashboardSuratKeteranganDomisiliController::class,'cetakpdf']);
            Route::get('/dashboard/layanan/surat_keterangan_domisili/{skd:id}/cetak-surat', [DashboardSuratKeteranganDomisiliController::class,'cetak_surat']);

            //surat keterangan pindah
            Route::resource('/dashboard/layanan/surat_keterangan_pindah', DashboardSuratKeteranganPindahController::class);
            Route::get('/dashboard/layanan/surat_keterangan_pindah/{skp:id}/verifikasi', [DashboardSuratKeteranganPindahController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_pindah/{skp:id}', [DashboardSuratKeteranganPindahController::class,'verifikasi_skp']);
            Route::get('/dashboard/layanan/skp/cetak', [DashboardSuratKeteranganPindahController::class,'cetak']);
            Route::get('/dashboard/layanan/skp/cetakpdf', [DashboardSuratKeteranganPindahController::class,'cetakpdf']);

            //surat keterangan tidak mampu
            Route::resource('/dashboard/layanan/surat_keterangan_tidak_mampu', DashboardSuratKeteranganTidakMampuController::class);
            Route::get('/dashboard/layanan/surat_keterangan_tidak_mampu/{sktm:id}/verifikasi', [DashboardSuratKeteranganTidakMampuController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_tidak_mampu/{sktm:id}', [DashboardSuratKeteranganTidakMampuController::class,'verifikasi_sktm']);
            Route::get('/dashboard/layanan/sktm/cetak', [DashboardSuratKeteranganTidakMampuController::class,'cetak']);
            Route::get('/dashboard/layanan/sktm/cetakpdf', [DashboardSuratKeteranganTidakMampuController::class,'cetakpdf']);
            Route::get('/dashboard/layanan/surat_keterangan_tidak_mampu/{skbm:id}/cetak-surat', [DashboardSuratKeteranganTidakMampuController::class,'cetak_surat']);


            //surat keterangan meninggal
            Route::resource('/dashboard/layanan/surat_keterangan_meninggal', DashboardSuratKeteranganMeninggalController::class);
            Route::get('/dashboard/layanan/surat_keterangan_meninggal/{skm:id}/verifikasi', [DashboardSuratKeteranganMeninggalController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_meninggal/{skm:id}', [DashboardSuratKeteranganMeninggalController::class,'verifikasi_skm']);
            Route::get('/dashboard/layanan/skm/cetak', [DashboardSuratKeteranganMeninggalController::class,'cetak']);
            Route::get('/dashboard/layanan/skm/cetakpdf', [DashboardSuratKeteranganMeninggalController::class,'cetakpdf']);
            Route::get('/dashboard/layanan/surat_keterangan_meninggal/{skm:id}/cetak-surat', [DashboardSuratKeteranganMeninggalController::class,'cetak_surat']);


            //surat keterangan belum Menikah
            Route::resource('/dashboard/layanan/surat_keterangan_belum_menikah', DashboardSuratKeteranganBelumMenikahController::class);
            Route::get('/dashboard/layanan/surat_keterangan_belum_menikah/{skbm:id}/verifikasi', [DashboardSuratKeteranganBelumMenikahController::class,'verifikasi']);
            Route::post('/dashboard/layanan/surat_keterangan_belum_menikah/{skbm:id}', [DashboardSuratKeteranganBelumMenikahController::class,'verifikasi_skbm']);
            Route::get('/dashboard/layanan/skbm/cetak', [DashboardSuratKeteranganBelumMenikahController::class,'cetak']);
            Route::get('/dashboard/layanan/skbm/cetakpdf', [DashboardSuratKeteranganBelumMenikahController::class,'cetakpdf']);
            Route::get('/dashboard/layanan/surat_keterangan_belum_menikah/{skbm:id}/cetak-surat', [DashboardSuratKeteranganBelumMenikahController::class,'cetak_surat']);
            
            //Profil Desa
            Route::resource('/dashboard/profil_desa', DashboardProfilDesaController::class);
            Route::resource('/dashboard/kategori_profil', DashboardCategoriProfilController::class);
            Route::get('/dashboard/kategori_profil/checkSlug', [DashboardCategoriProfilController::class, 'checkSlug']);
            
            
            Route::resource('/dashboard/user_login', DashboardKelolaUserController::class)->except('show');

            Route::get('/dashboard/edit_password/{user:id}/edit', [DashboardKelolaUserController::class,'edit_password']);
            Route::post('/dashboard/edit_password/{user:id}', [DashboardKelolaUserController::class,'update_password']);


            // Route::resource('/dashboard/user_login', AdminPegawaiLoginController::class)->except('show');
            // Route::resource('/dashboard/user_login', DashboardUserLoginController::class)->except('show');
            
            // dasboard Desa tanjungkarang
            Route::resource('/dashboard/mading_desa', DashboardMadingController::class)->except('show');
            // Route::get('/dashboard', [dashboardController::class, 'index']);
            Route::get('/dashboard', [dashboardController::class, 'index']);
            Route::get('/dashboard/cetak', [dashboardController::class, 'cetak']);
            Route::get('/dashboard/cetak_pdf', [dashboardController::class, 'cetakpdf']);
            Route::delete('/dashboard/pengaduan/{id}', [dashboardController::class, 'destroy']);

    //     }else{
    //         return redirect('/');
    //     }
    // }else{
    //     return redirect('/');
    // }

    
    
    
    
    

});    
