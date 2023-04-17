<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardAssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.programs.assistances.assistance', [
            'assistances' => Assistance::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.programs.assistances.create',[
            'program' => Program::all()
        ]);
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
            'nik' => 'required|unique:assistances',
            'program_id' => 'required',
            'alamat' => 'required|max:255'
            
        ]);

        Assistance::create($validatedData);

        return redirect('/dashboard/programs/assistances')->with('success', 'Data has been added!');
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
    public function edit(Assistance $assistance)
    {
        return view('dashboard.programs.assistances.edit',[
            'assistance'=>$assistance,
            'programs' => Program::all()
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assistance $assistance)
    {
        $rules = [
            'nama' => 'required|max:255',
            'program_id' => 'required',
            'alamat' => 'required|max:255'
        ];
        if ($request->name != $assistance->name) {
            $rules['nik'] = 'required|unique:assistances';
        }

        $validatedData = $request->validate($rules);

        Assistance::where('id', $assistance->id)
            ->update($validatedData);

        return redirect('/dashboard/programs/assistances')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assistance $assistance)
    {
        Assistance ::destroy($assistance->id);
        return redirect('/dashboard/potensiDesa')->with('success', 'Data has been added!');
    }

    

}
