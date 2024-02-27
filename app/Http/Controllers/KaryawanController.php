<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    function index()
    {
        return view('karyawan.beranda');
    }
}
