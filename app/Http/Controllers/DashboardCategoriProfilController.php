<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProfil;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class DashboardCategoriProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
        return view('dashboard.category_profil.index', [
            'category_profil' => CategoryProfil::all()
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
        return view('dashboard.category_profil.create');
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
            'slug' => 'required|unique:category_profil'
        ]);

        CategoryProfil::create($validatedData);

        return redirect('/dashboard/kategori_profil')->with('success', 'Kategori Profil Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProfil $categori_profil)
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
        if(Auth::user()->user_role_id == 1){
        $category_profil = CategoryProfil::find($id);
        return view('dashboard.category_profil.edit', [
                'categori'=>$category_profil
            ]);
        }else{
            return abort(403);
        }  
        // dd($categori_profil);
        // return view('dashboard.category_profil.edit', [
        //     'categori' => $categori_profil
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category_profil = CategoryProfil::find($id);
        $rules = [
            'nama' => 'required|max:255',
        ];
        if ($request->slug != $category_profil->slug) {
            $rules['slug'] = 'required|unique:category_profil';
        }

        $validatedData = $request->validate($rules);

        CategoryProfil::where('id', $category_profil->id)
            ->update($validatedData);

        return redirect('/dashboard/kategori_profil')->with('success', 'Kategori Profil Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_profil = CategoryProfil::find($id);
        CategoryProfil::destroy($category_profil->id);
        return redirect('/dashboard/kategori_profil')->with('success', 'Kategori Profil Berhasil Dihapus');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(CategoryProfil::class, 'slug', $request->nama);
        return response()->json(['slug'=>$slug]);

    }
}
