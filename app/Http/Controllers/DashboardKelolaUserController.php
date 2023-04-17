<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardKelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role_id == 1){

            $users = User::latest();
            if(request('cari')) {
                $users->where('username', 'like' , '%' . \request('cari') . '%')
                    ->orWhere('nik', 'like' , '%' . \request('cari') . '%');

            }
            return view('dashboard.user_login.index', [
                'users' => $users->get()
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
            return view('dashboard.user_login.create',[
                'user_role' => UserRole::all()
            ]);
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
            'username'=> ['required','min:3','max:255','unique:users'],
            'nik'=> ['required','min:3','max:255','unique:users'],
            'password' => ['required','min:6','max:255'],
            'user_role_id' => ['required'],
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successful! Please login');

        return redirect('/dashboard/user_login')->with('success', 'Akun Berhasil Ditambah');
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
        if(Auth::user()->user_role_id == 1){   
        $user = User::find($id);
        return view('dashboard.user_login.edit', [
                'user'=>$user,
                'user_role' => UserRole::all()
            ]);
        }else{
            return abort(403);
        }
        // dd($users);
        // return $users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request,$id)
    // {
    //     //validate post data
    //     $user = User::find($id);
    //     $rules = [
    //         'name' => ['required','max:255'],
    //         'password' => ['required','min:6','max:255'],
    //         'user_role_id' => ['required'],
    //     ];

    //     if($request->username != $user->username){
    //         $rules['username']='required|min:3|max:255|unique:users';
    //     }
    //     if($request->email != $user->email){
    //         $rules['email']='required|min:3|max:255|unique:users';
    //     }
    //     if($request->nik != $user->nik){
    //         $rules['nik']='required|min:3|max:255|unique:users';
    //     }

    //     $validatedData = $request->validate($rules);
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::where('id', $user->id)
    //         ->update($validatedData);
    //     // $user -> update($request->all());
    //     return redirect('/dashboard/user_login')->with('success', 'Data Berhadil Di Ubah');
    // }
    public function update(Request $request,$id)
    {
        //validate post data
        $user = User::find($id);
        $rules = [
            'user_role_id' => ['required'],
        ];

        if($request->username != $user->username){
            $rules['username']='required|min:3|max:255|unique:users';
        }
        if($request->nik != $user->nik){
            $rules['nik']='required|min:3|max:255|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validatedData);
        // $user -> update($request->all());
        return redirect('/dashboard/user_login')->with('success', 'Data Berhasil Diubah');
    }


    public function edit_password($id)
    {
        if(Auth::user()->user_role_id == 1){   
        $user = User::find($id);
        return view('dashboard.user_login.edit_password', [
                'user'=>$user,
            ]);
        }else{
            return abort(403);
        }
    }
    public function update_password(Request $request,$id)
    {
        //validate post data
        $user = User::find($id);
        $rules = [
            'password' => ['required','min:6','max:255'],
        ];
        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);
        // $user -> update($request->all());
        return redirect('/dashboard/user_login')->with('success', 'Password Berhasil DiReset');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        User::destroy($user->id);
        return redirect('/dashboard/user_login')->with('success', 'Data Berhasil DiHapus');
    }
}
