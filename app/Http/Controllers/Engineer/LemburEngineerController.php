<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburEngineerController extends Controller
{
    function lemburpengajuan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::whereIn('statacc_engineer', ['pengajuan', 'ditolak'])
                            ->where('ptgs_engineer', $id_user)
                            ->get();
        $kegiatanku = Kegiatan::where('id_user', $id_user)
                            ->whereIn('statacc_manager', ['pengajuan', 'ditolak'])
                            ->get();

        return view("engineer.lemburpengajuan", compact('kegiatan','kegiatanku'));
    }
    function lemburpengajuanterima($id_kegiatan) {

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->statacc_engineer = 'diterima';
        $kegiatan->save();

        return redirect("/engineer/datapengajuan")->with('success', 'Lembur karyawan berhasil diterima');;
    }

    function lemburpengajuantolak($id_kegiatan) {

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->statacc_engineer = 'ditolak';
        $kegiatan->save();

        return redirect("/engineer/datapengajuan")->with('success', 'Data karyawan berhasil ditolak');;
    }
}
