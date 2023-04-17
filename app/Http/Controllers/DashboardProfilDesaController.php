<?php

namespace App\Http\Controllers;

use App\Models\CategoryProfil;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
        return view('dashboard.profil.index', [
            'profil_desa' => ProfilDesa::all()
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
        if(Auth::user()->user_role_id == 1){
        return view('dashboard.profil.create', [
            'kategori_profil' => CategoryProfil::all()
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
            'nama' => 'required|max:255',
            'category_profil_id' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profil-images');
        }

        ProfilDesa::create($validatedData);

        return redirect('/dashboard/profil_desa')->with('success','Profi Desa Berhasil Ditambahkan!');
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
    public function edit(ProfilDesa $profil_desa)
    {
        if(Auth::user()->user_role_id == 1){
        return view('dashboard.profil.edit',[
            'profil'=>$profil_desa,
            'kategori_profil' => CategoryProfil::all()
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
    public function update(Request $request, ProfilDesa $profil_desa)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_profil_id' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:1024',
        ];
        $validatedData = $request->validate($rules);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profil-images');
        }
        ProfilDesa::where('id', $profil_desa->id)
        ->update($validatedData);

        return redirect('/dashboard/profil_desa')->with('success','Profi Desa Berhasil Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilDesa $profil_desa)
    {
        if($profil_desa->image){
            Storage::delete($profil_desa->image);
        }
        ProfilDesa::destroy($profil_desa->id);

        return redirect('/dashboard/profil_desa')->with('success','Profil Desa Berhasil Dihapus!');
    }
}
