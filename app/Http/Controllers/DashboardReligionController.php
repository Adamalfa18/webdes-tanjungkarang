<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            $religion = Religion::all();
            $data = Religion::pluck('agama');
            return view('dashboard.data.religions.index', compact('religion', 'data',));
            }else{
                return abort(403);
            }   

        // return view('dashboard.data.religions.index', [
        //     '' => Religion::all()
        //     // 'posts' => Post::where('user_id', auth()->user()->id)->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data.religions.create');
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
        //     'agama' => 'required|unique:religions',
        //     'jumlah' => 'required|max:255'
        // ]);

        // Religion::create($validatedData);

        // return redirect('/dashboard/data/religions')->with('success', 'Data Berhasil Ditambah');

        $validatedData = Validator::make($request->all(), [
            'agama' => 'required|unique:religions',
        ]);
        if ($validatedData->fails()) {
            return back()->with('error', 'Data Agama Sudah Ada!');
        } else {
            $religion = new Religion([
            'agama' => $request->agama,
            ]);

            $religion->save();
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
    public function edit(Religion $religion)
    {
        return view('dashboard.data.religions.edit', [
            'religion' => $religion
        ]);
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
        // if ($request->agama != $religion->agama) {
        //     $rules['agama'] = 'required|unique:religions';
        // }

        // $validatedData = $request->validate($rules);

        // Religion::where('id', $religion->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/data/religions')->with('success', 'Data Berhasil Diubah');

        $religion = Religion::findorfail($id);
        $validator = Validator::make($request->all(), [
            'agama' =>'required|unique:religions,agama,' . $religion->id
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Data Agama Sudah Ada!');
        } else {
            $data = [
                'kelompok' => $request->kelompok, 
                ];

                $religion->update($data);
                return back()->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion)
    {
        Religion::destroy($religion->id);
        return redirect('/dashboard/data/religions')->with('success', 'Data Berhasil Dihapus');
    }
}
