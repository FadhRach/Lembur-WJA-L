<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaManagerController extends Controller
{
    function index()
    {
        return view('manager.beranda');
    }
}
