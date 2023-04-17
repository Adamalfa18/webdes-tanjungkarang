<?php

namespace App\Http\Controllers;

use App\Models\DokumenSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DashboardDokumenSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            return view('dashboard.dokumen_surat.index', [
                'dokumen_surat' => DokumenSurat::all()
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
            return view('dashboard.dokumen_surat.create');
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
            'deskripsi' => 'required|max:255',
            'file' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        ]);
        if($request->file('file')){
            $validatedData['file'] = $request->file('file')->store('data-file');
        }

        DokumenSurat::create($validatedData);

        return redirect('/dashboard/dokumen_surat')->with('success', 'Dokumen Berhasil Ditambahkan');
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
    public function edit($id)
    {
        if(Auth::user()->user_role_id == 1 || Auth::user()->user_role_id == 2){
            $dokumen_surat = DokumenSurat::find($id);
            return view('dashboard.dokumen_surat.edit', [
                'dokumen_surat' => $dokumen_surat
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
        $dokumen_surat = DokumenSurat::find($id);
        $rules = [
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'file' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        ];
        $validatedData = $request->validate($rules);

        if($request->file('file')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['file'] = $request->file('file')->store('data-file');
        }

        DokumenSurat::where('id', $dokumen_surat->id)
        ->update($validatedData);

        return redirect('/dashboard/dokumen_surat')->with('success','Dokumen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumen_surat = DokumenSurat::find($id);
        if($dokumen_surat->file){
            Storage::delete($dokumen_surat->file);
        }
        DokumenSurat::destroy($dokumen_surat->id);
        return redirect('/dashboard/dokumen_surat')->with('success', 'Dokumen Berhasil Dihapus');
    }
}
