<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardAparaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            return view('dashboard.aparaturs.index', [
                'aparatur' => AparaturDesa::latest()->get()
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
        if(Auth::user()->user_role_id == 1){
            return view('dashboard.aparaturs.create');
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
        //
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|unique:aparatur_desas',
            'jabatan' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('aparatur-images');
        }

        AparaturDesa::create($validatedData);

        return redirect('/dashboard/aparatur')->with('success', 'Data Pegawai Berhasil Ditambah');
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
    public function edit(AparaturDesa $aparatur)
    {
        if(Auth::user()->user_role_id == 1){
            return view('dashboard.aparaturs.edit', [
                'aparatur' => $aparatur
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
    public function update(Request $request,AparaturDesa $aparatur)
    {
        //

        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
            'jabatan' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];

        if($request->no_hp != $aparatur->no_hp){
            $rules['no_hp']='required|unique:aparatur_desas';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('aparatur-images');
        }

        AparaturDesa::where('id', $aparatur->id)
        ->update($validatedData);

        return redirect('/dashboard/aparatur')->with('success','Data Pegawai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AparaturDesa $aparatur)
    {
        //

        if($aparatur->image){
            Storage::delete($aparatur->image);
        }
        AparaturDesa::destroy($aparatur->id);

        return redirect('/dashboard/aparatur')->with('success','Data Pegawai Berhasil Dihapus');
    }
}
