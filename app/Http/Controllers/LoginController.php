<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->user_role_id == 1){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            }elseif(Auth::user()->user_role_id == 2){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard/layanan');
            }else{
                 request()->session()->invalidate();
                 request()->session()->regenerateToken();
                 return back()->with('loginError','Hanya Untuk Pegawai Desa');
                // return redirect('/login_');
            }

        }

        return back()->with('loginError','Login failed!');
    }

    public function user()
    {
        return view('login.layanan', [
            'title' => 'Login'
        ]);
    }

    public function layanan(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->user_role_id == 3){
            $request->session()->regenerate();
            return redirect()->intended('/layanan');
            }elseif(Auth::user()->user_role_id == 4){
                request()->session()->invalidate();
                request()->session()->regenerateToken();
            return redirect()->intended('/verifikasi_akun');
            }else{
                request()->session()->invalidate();
                request()->session()->regenerateToken();
                return back()->with('loginError','Akun Belum Tersedia');
            }
        }

        return back()->with('loginError','Login failed!');
    }
   public function index_verifikasi(){
    return view('verifikasi_akun');
   }
   
   public function edit_password($id)
   {
       
       $user = User::find($id);
       return view('layanan.ubah_password', [
               'user'=>$user,
           ]);
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
        return redirect('/layanan')->with('success', 'Password Berhasil DiReset');
    }

    public function logout()
        {
            Auth::logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();
            
            return redirect('/');
        }   

}
