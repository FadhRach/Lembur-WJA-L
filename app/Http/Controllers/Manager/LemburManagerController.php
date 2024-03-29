<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburManagerController extends Controller
{
    // --------------------------------------------------------------------------------------------------------------
    function lemburpengajuan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::whereIn('statacc_manager', ['pengajuan', 'ditolak'])
                            ->where('statacc_engineer', 'diterima')
                            ->where('ptgs_manager', $id_user)
                            ->get();
        $kegiatanblm = Kegiatan::whereIn('statacc_engineer', ['pengajuan', 'ditolak'])
                            ->whereIn('statacc_manager', ['pengajuan', 'ditolak'])
                            ->get();
        return view("manager.lemburpengajuan",compact('kegiatan','kegiatanblm'));
    }
    
    function lemburpengajuanterima($id_kegiatan) {

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->statacc_manager = 'diterima';
        $kegiatan->save();

        return redirect("/manager/datapengajuan")->with('success', 'Lembur karyawan berhasil diterima');;
    }

    function lemburpengajuantolak($id_kegiatan) {

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->statacc_manager = 'ditolak';
        $kegiatan->save();

        return redirect("/manager/datapengajuan")->with('success', 'Lembur karyawan berhasil ditolak');;
    }
    // ------------------------------------------------------------------------------------------------------------
   
    
}
