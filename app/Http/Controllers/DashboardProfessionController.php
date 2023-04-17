<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DashboardProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
        $profession = Profession::all();
        $data = Profession::pluck('kelompok');
        return view('dashboard.data.professions.index', compact('profession', 'data'));
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
        // return view('dashboard.data.professions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'kelompok' => 'required|unique:professions',
        //     'jumlah' => 'required|max:255'
        // ]);
        // $cek = Profession::create($validatedData);
        // if($cek){
        //     return redirect('/dashboard/data/professions')->with(['success'=> 'Data Berhasil Ditambah']);
        // }
        //     return redirect('/dashboard/data/professions')->with(['error'=>'Data Gagal Ditambah']);      
            $validatedData = Validator::make($request->all(), [
                'kelompok' => 'required|unique:professions',
            ]);
            if ($validatedData->fails()) {
                return back()->with('error', 'Data Pekerjaan Sudah Ada!');
            } else {
                $profession = new Profession([
                'kelompok' => $request->kelompok,
                ]);

                $profession->save();
                return back()->with('success', 'Data Berhasil Ditambahkan');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        // return view('dashboard.data.professions.edit', [
        //     'profession' => $profession
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $rules = [
        //     'jumlah' => 'required|max:255'
        // ];
        // if ($request->kelompok != $profession->kelompok) {
        //     $rules['kelompok'] = 'required|unique:professions';
        // }

        // $validatedData = $request->validate($rules);

        // Profession::where('id', $profession->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/data/professions')->with('success', 'Data Berhasil Diubah');


        $profession = Profession::findorfail($id);
        $validator = Validator::make($request->all(), [
            'kelompok' =>'required|unique:professions,kelompok,' . $profession->id
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Data Pekerjaan Sudah Ada!');
        } else {
            $data = [
                'kelompok' => $request->kelompok, 
                ];

                $profession->update($data);
                return back()->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        Profession::destroy($profession->id);
        return redirect('/dashboard/data/professions')->with('success', 'Data Berhasil Dihapus');
    }
}
