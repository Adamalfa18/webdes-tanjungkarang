<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){

            // $education = DB::table('data_penduduk')
            //                     ->join('education','education.id','data_penduduk.education_id')
            //                     ->select('education.pendidikan as pendidikan', DB::raw('count(data_penduduk.education_id) as total'))
            //                     ->orderBy('education.pendidikan','desc')
            //                     ->groupBy('education.id')
            // ->get();
            // return view('dashboard.data.educations.index', compact('education'));
            // dd($data_penduduk);
            $education = Education::all();
            $data = Education::pluck('pendidikan');
            return view('dashboard.data.educations.index', compact('education', 'data'));
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
        return view('dashboard.data.educations.create');
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
        //     'pendidikan' => 'required|unique:education',
        //     'jumlah' => 'required|max:255'
        // ]);

        // Education::create($validatedData);

        // return redirect('/dashboard/data/educations')->with('success', 'Data Berhasil Ditambah');

        $validatedData = Validator::make($request->all(), [
            'pendidikan' => 'required|unique:education',
        ]);
        if ($validatedData->fails()) {
            return back()->with('error', 'Data Pendidikan Sudah Ada!');
        } else {
            $education = new Education([
            'pendidikan' => $request->pendidikan,
            ]);

            $education->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        // return view('dashboard.data.educations.edit', [
        //     'education' => $education
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
        // $rules = [
        //     'jumlah' => 'required|max:255'
        // ];
        // if ($request->pendidikan != $education->pendidikan) {
        //     $rules['pendidikan'] = 'required|unique:education';
        // }

        // $validatedData = $request->validate($rules);

        // Education::where('id', $education->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/data/educations')->with('success', 'Data Berhasil Diubah');
        $education = Education::findorfail($id);
        $validator = Validator::make($request->all(), [
            'pendidikan' =>'required|unique:education,pendidikan,' . $education->id
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Data Pendidikan Sudah Ada!');
        } else {
            $data = [
                'pendidikan' => $request->pendidikan, 
                ];

                $education->update($data);
                return back()->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        Education::destroy($education->id);
        return redirect('/dashboard/data/educations')->with('success', 'Data Berhasil Dihapus');
    }
}
