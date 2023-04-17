<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
    return view('register.index', [
        'title' => 'Register'
    ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'username'=> ['required','min:3','max:255','unique:users'],
            'email' => ['required','email:dns' , 'unique:users'],
            'nik'=> ['required','min:3','max:255','unique:users'],
            'password' => ['required','min:6','max:255'],
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['user_role_id'] = 4;

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successful! Please login');

        return redirect('/')->with('success', 'Pendaftaran Di Peoses');
    }
}
