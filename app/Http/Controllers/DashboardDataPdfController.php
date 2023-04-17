<?php

namespace App\Http\Controllers;

use App\Models\DataPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardDataPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->user_role_id == 1){
            return view('dashboard.data_pdf.index', [
                'data_pdf' => DataPdf::all()
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
            return view('dashboard.data_pdf.create');
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
            'file' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        ]);
        if($request->file('file')){
            $validatedData['file'] = $request->file('file')->store('data-file');
        }

        DataPdf::create($validatedData);

        return redirect('/dashboard/data_pdf')->with('success', 'Dokumen Berhasil Ditambahkan');
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
    public function edit($id)
    {
        if(Auth::user()->user_role_id == 1){
            $datapdf = DataPdf::find($id);
            return view('dashboard.data_pdf.edit', [
                'datapdf' => $datapdf
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
        $datapdf = DataPdf::find($id);
        $rules = [
            'judul' => 'required|max:255',
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

        DataPdf::where('id', $datapdf->id)
        ->update($validatedData);

        return redirect('/dashboard/data_pdf')->with('success','Dokumen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapdf = DataPdf::find($id);
        if($datapdf->file){
            Storage::delete($datapdf->file);
        }
        DataPdf::destroy($datapdf->id);
        return redirect('/dashboard/data_pdf')->with('success', 'Dokumen Berhasil Dihapus');
    }
}
