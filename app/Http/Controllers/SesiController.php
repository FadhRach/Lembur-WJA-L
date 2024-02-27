<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'manager'){
                return redirect('/manager');
            } elseif (Auth::user()->role == 'engineer'){
                return redirect('/engineer');
            } elseif (Auth::user()->role == 'karyawan'){
                return redirect('/karyawan');
            }
        } else {
            return redirect('')->with('failed','email atau password salah')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
