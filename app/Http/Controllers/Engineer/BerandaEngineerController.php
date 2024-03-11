<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaEngineerController extends Controller
{
    function index()
    {
        return view('engineer.beranda');
    }
}
