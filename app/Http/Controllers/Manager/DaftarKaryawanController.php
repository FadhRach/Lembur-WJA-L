<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarKaryawanController extends Controller
{
    function index()
    {
        $user = User::all();
        return view("manager.daftarkaryawan",["user" => $user]);
    }

    function tambah()
    {   
        
        return view("manager.daftarkaryawantambah");
    }
}
