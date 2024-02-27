<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EngineerController extends Controller
{
    function index()
    {
        return view('engineer.beranda');
    }
}
