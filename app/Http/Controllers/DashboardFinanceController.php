<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class DashboardFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::all();
        $data = Finance::pluck('title');
        $jumlah_data = Finance::pluck('jumlah');
        return view('dashboard.finances.index', compact('finances', 'data', 'jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.finances.create');
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
            'title' => 'required|unique:finances',
            'jumlah' => 'required|max:255',
            'belanja' => 'required|max:255',
            'sisa' => 'required|max:255',
            'category' => 'required|max:255'
        ]);

        Finance::create($validatedData);

        return redirect('/dashboard/finances')->with('success', 'Data Berhasil Ditambah');
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
    public function edit( Finance $finance)
    {
        return view('dashboard.finances.edit', [
            'finance' => $finance
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Finance $finance)
    {
        $rules = [
            'jumlah' => 'required|max:255',
            'belanja' => 'required|max:255',
            'sisa' => 'required|max:255',
            'category' => 'required|max:255'
        ];
        if ($request->title != $finance->title) {
            $rules['title'] = 'required|unique:finances';
        }

        $validatedData = $request->validate($rules);

        Finance::where('id', $finance->id)
            ->update($validatedData);

        return redirect('/dashboard/finances')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        Finance::destroy($finance->id);
        return redirect('/dashboard/finances')->with('success', 'Data Berhasil Dihapus');
    }
}
