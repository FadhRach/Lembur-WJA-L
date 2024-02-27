<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function index()
    {
        return view('manager.beranda');
    }
}
