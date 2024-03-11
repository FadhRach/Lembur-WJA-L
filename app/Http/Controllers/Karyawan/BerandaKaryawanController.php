<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaKaryawanController extends Controller
{
    function index()
    {
        return view('karyawan.beranda');
    }
}
