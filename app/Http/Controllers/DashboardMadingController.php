<?php

namespace App\Http\Controllers;

use App\Models\MadingDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardMadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            return view('dashboard.mading_desa.index', [
                'mading_desa' => MadingDesa::all()
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
            return view('dashboard.mading_desa.create');
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255',
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('mading-images');
        }

        MadingDesa::create($validatedData);

        return redirect('/dashboard')->with('success', 'Tambah Data Mading Berhasil');
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
    public function edit(MadingDesa $madingDesa)
    {
        if(Auth::user()->user_role_id == 1){
            return view('dashboard.mading_desa.edit', [
                'mading' => $madingDesa
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
    public function update(Request $request,MadingDesa $madingDesa)
    {
        $rules = [
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('mading-images');
        }

        MadingDesa::where('id', $madingDesa->id)
        ->update($validatedData);

        return redirect('/dashboard')->with('success','Ubah Data Mading Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MadingDesa $madingDesa)
    {
        MadingDesa::destroy($madingDesa->id);
        if($madingDesa->image){
            Storage::delete($madingDesa->image);
        }

        return redirect('/dashboard')->with('success','Data Mdaing Berhasil Dihapus');
    }
}
