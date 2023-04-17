<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\Education;
use App\Models\Gender;
use App\Models\Marriage;
use App\Models\Profession;
use App\Models\Religion;
use App\Models\User;
use App\Models\Warganegara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardDataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            $data_penduduk = DataPenduduk::latest();
            if(request('cari')) {
                $data_penduduk->where('nama', 'like' , '%' . \request('cari') . '%')
                            ->orWhere('nik', 'like' , '%' . \request('cari') . '%');

            }
            return view('dashboard.data.data_penduduk.index', [
                'data_penduduk' => $data_penduduk->get(),
                'pendidikan' => Education::all(),
                'agama' => Religion::all(),
                'pekerjaan' => Profession::all(),
                'jenis_kelamin' => Gender::all(),
                'perkawinan'=> Marriage::all(),
                'warganegara'=> Warganegara::all()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'nik' => 'required|unique:data_penduduk',
             'nama' => 'required|max:70',
             'no_kk' => 'required|max:20',
             'no_hp' => 'required|max:12',
             'alamat' => 'required|max:255',
             'tanggal_lahir' => 'required',
             'religions_id' => 'required',
             'education_id' => 'required',
             'professions_id' => 'required',
             'marriages_id' => 'required',
             'genders_id' => 'required',
             'warganegara_id' => 'required'
             
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            try {
                $user = new User([
                    'username' => strtolower(str_replace(' ', '', $request->nama . $request->nik)),
                    'nik' =>  $request->nik ,
                    'password' => bcrypt('1234211234'),
                    'user_role_id' => 3,
                ]);
                $user->save();
            } catch (\Throwable $th) {
                $notifError = array
                (
                    'message' => 'Username Telah Digunakan',
                    'alert-type' => 'error'
                );
                return back()->with('error', 'Username telah digunakan');
            }
            $penduduk = new DataPenduduk([
                'user_id' => $user->id,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'no_kk' => $request->no_kk,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'religions_id' => $request->religions_id,
                'education_id' => $request->education_id,
                'professions_id' => $request->professions_id,
                'marriages_id' => $request->marriages_id,
                'genders_id' => $request->genders_id,
                'warganegara_id' => $request->warganegara_id,
            ]);
            $penduduk->save();

            $notifSuccess = array
            (
            'message' => 'Data Siswa Berhasil Ditambah',
            'alert-type' => 'success'
            );
            return back()->with('success', 'Data Berhasil Ditambahkan');
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
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenduduk $data_penduduk)
    {
        if(Auth::user()->user_role_id == 1){
            return view('dashboard.data.data_penduduk.edit', [
                'penduduk'=>$data_penduduk,
                'pendidikan' => Education::all(),
                'agama' => Religion::all(),
                'pekerjaan' => Profession::all(),
                'jenis_kelamin' => Gender::all(),
                'perkawinan'=> Marriage::all(),
                'warganegara'=> Warganegara::all()
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
        $penduduk = DataPenduduk::find($id);
        $rules = [
             'nama' => 'required|max:70',
             'no_kk' => 'required|max:20',
             'no_hp' => 'required|max:12',
             'alamat' => 'required|max:255',
             'tanggal_lahir' => 'required',
             'religions_id' => 'required',
             'education_id' => 'required',
             'professions_id' => 'required',
             'marriages_id' => 'required',
             'genders_id' => 'required',
             'warganegara_id' => 'required'
        ];
        if($request->nik != $penduduk->nik){
            $rules['nik']='required|unique:data_penduduk';
        }

        $validatedData = $request->validate($rules);

        DataPenduduk::where('id', $penduduk->id)
        ->update($validatedData);

        return redirect('/dashboard/data-penduduk')->with('success','Berita Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenduduk $data_penduduk)
    {
        DataPenduduk::destroy($data_penduduk->id);
        return redirect('/dashboard/data-penduduk')->with('success', 'Data Berhasil Dihapus');
    }
}
