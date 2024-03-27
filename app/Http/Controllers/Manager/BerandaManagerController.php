<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaManagerController extends Controller
{
    function index()
    {
        $kegiatan = Kegiatan::all();
        $kegiatanterbaru = Kegiatan::latest()->take(5)->get();

        return view('manager.beranda', compact('kegiatan','kegiatanterbaru'));
    }
}
