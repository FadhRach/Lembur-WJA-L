<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BuatLemburController extends Controller
{
    function index() {

        $engineer = User::where('role', 'engineer')->get();
        $manager = User::where('role', 'manager')->get();

        return view('karyawan.buatlembur', compact('engineer','manager'));
    }
}
