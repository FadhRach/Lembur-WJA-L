<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuatLemburController extends Controller
{
    function index() {
        return view('karyawan.buatlembur');
    }
}
