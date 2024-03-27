<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class LemburManagerController extends Controller
{
    // --------------------------------------------------------------------------------------------------------------
    function lemburpengajuan() {

        $kegiatan = Kegiatan::where('statacc_engineer', 'diterima')->where('statacc_manager', 'pengajuan')->get();

        return view("manager.lemburpengajuan",["kegiatan"=>$kegiatan]);
    }

    function lemburpengajuanterima($id_kegiatan) {

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->statacc_manager = 'diterima';
        $kegiatan->save();

        return redirect("/manager/datapengajuan");
    }

    function lemburpengajuantolak($id_kegiatan) {

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->statacc_manager = 'ditolak';
        $kegiatan->save();

        return redirect("/manager/datapengajuan");
    }
    // ------------------------------------------------------------------------------------------------------------
   
    
}
