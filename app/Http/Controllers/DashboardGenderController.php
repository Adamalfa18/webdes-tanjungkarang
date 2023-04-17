<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            $gender = Gender::all();
            $data = Gender::pluck('jenis');
            return view('dashboard.data.genders.index', compact('gender','data'));
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
        return view('dashboard.data.genders.create');
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
        //     'jenis' => 'required|unique:genders',
        //     'jumlah' => 'required|max:255'
        // ]);

        // Gender::create($validatedData);

        // return redirect('/dashboard/data/genders')->with('success', 'Data Berhasil Ditambah');

        $validatedData = Validator::make($request->all(), [
            'jenis' => 'required|unique:genders',
        ]);
        if ($validatedData->fails()) {
            return back()->with('error', 'Data Jenis Kelamin Sudah Ada!');
        } else {
            $gender = new Gender([
            'jenis' => $request->jenis,
            ]);

            $gender->save();
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
    public function edit(Gender $gender)
    {
        return view('dashboard.data.genders.edit', [
            'gender' => $gender
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
        // if ($request->jenis != $gender->jenis) {
        //     $rules['jenis'] = 'required|unique:genders';
        // }

        // $validatedData = $request->validate($rules);

        // Gender::where('id', $gender->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/data/genders')->with('success', 'Data Berhasil Diubah');

        $gender = Gender::findorfail($id);
        $validator = Validator::make($request->all(), [
            'jenis' =>'required|unique:genders,jenis,' . $gender->id
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Data Jenis Kelamin Sudah Ada!');
        } else {
            $data = [
                'jenis' => $request->jenis, 
                ];

                $gender->update($data);
                return back()->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        Gender::destroy($gender->id);
        return redirect('/dashboard/data/genders')->with('success', 'Data Berhasil Dihapus');
    }
}
