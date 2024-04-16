<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburEngineerController extends Controller
{
    function lemburpengajuan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('ptgs_engineer', $id_user)
                            ->whereIn('statacc_manager', ['pengajuan', 'ditolak'])
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

    function lemburlaporan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('id_user', $id_user)
                            ->where('statacc_manager', 'diterima')
                            ->where('statacc_engineer', 'diterima')
                            ->where('kegiatan_stat', 'progress')
                            ->get();
        return view("engineer.lemburlaporan", ["kegiatan"=>$kegiatan]);
    }

    function lemburlaporandetail($id_kegiatan) {

        $laporan = Laporan::findOrFail($id_kegiatan);

        return view("engineer.lemburlaporandetail",["laporan"=>$laporan]);
    }
}
