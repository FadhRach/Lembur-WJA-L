<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class BerandaEngineerController extends Controller
{
    function index()
    {
        $kegiatan = Kegiatan::all();
        $kegiatanterbaru = Kegiatan::latest()->take(5)->get();

        return view('manager.beranda', compact('kegiatan','kegiatanterbaru'));
    }
}
