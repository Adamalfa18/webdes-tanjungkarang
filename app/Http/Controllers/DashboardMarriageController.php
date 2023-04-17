<?php

namespace App\Http\Controllers;

use App\Models\Marriage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardMarriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){
            $marriage = Marriage::all();
            $data = Marriage::pluck('status');
            return view('dashboard.data.marriages.index', compact('marriage', 'data'));
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
        return view('dashboard.data.marriages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'status' => 'required|unique:marriages',
        ]);
        if ($validatedData->fails()) {
            return back()->with('error', 'Data Perkawinan Sudah Ada!');
        } else {
            $marriage = new Marriage([
            'status' => $request->status,
            ]);

            $marriage->save();
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
    public function edit(Marriage $marriage)
    {
        return view('dashboard.data.marriages.edit', [
            'marriage' => $marriage
        ]);
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
        // $rules = [
        //     'jumlah' => 'required|max:255'
        // ];
        // if ($request->kelompok != $marriage->kelompok) {
        //     $rules['status'] = 'required|unique:marriage';
        // }

        // $validatedData = $request->validate($rules);

        // Marriage::where('id', $marriage->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/data/marriages')->with('success', 'Data Berhasil Diubah');

        $marriage = Marriage::findorfail($id);
        $validator = Validator::make($request->all(), [
            'status' =>'required|unique:marriages,status,' . $marriage->id
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Data Perkawinan Sudah Ada!');
        } else {
            $data = [
                'status' => $request->status, 
                ];

                $marriage->update($data);
                return back()->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marriage $marriage)
    {
        Marriage::destroy($marriage->id);
        return redirect('/dashboard/data/marriages')->with('success', 'Data Berhasil Dihapus');
    }
}
