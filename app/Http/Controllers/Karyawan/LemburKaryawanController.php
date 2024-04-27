<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburKaryawanController extends Controller
{   
    // PENGAJUAN --------------------------------------------------------------------------------------------------------------
    function lemburpengajuan() {   
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('id_user',$id_user)
                            ->whereIn('statacc_manager', ['pengajuan', 'ditolak'])
                            ->get();
        return view('karyawan.lemburpengajuan', compact('kegiatan'));
    }

    function lemburpengajuandetail($id_kegiatan) {

        $laporan = Laporan::findOrFail($id_kegiatan);
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        return view("karyawan.lemburpengajuandetail",compact('laporan','kegiatan'));
    }

    function lemburpengajuandelete($id_kegiatan){

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->delete();
        return redirect("/karyawan/datapengajuan")->with('success', 'Pengajuan Lembur berhasil dihapus');
    }

    // LAPORAN --------------------------------------------------------------------------------------------------------------
    function lemburlaporan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('id_user', $id_user)
                            ->where('statacc_manager', 'diterima')
                            ->where('statacc_engineer', 'diterima')
                            ->where('kegiatan_stat', 'progress')
                            ->get();
        return view("karyawan.lemburlaporan", ["kegiatan"=>$kegiatan]);
    }

    function lemburlaporandetail($id_kegiatan) {

        $laporan = Laporan::findOrFail($id_kegiatan);
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        return view("karyawan.lemburlaporandetail",compact('laporan','kegiatan'));
    }

    function lemburlaporansave($id_kegiatan, Request $request) {
        $laporan = laporan::findOrFail($id_kegiatan);
        $laporan->kgtn_tercapai = $request->kgtn_tercapai;
        $laporan->deskripsi_hasil = $request->deskripsi_hasil;
        $laporan->komentar = $request->komentar;

        if ($request->hasFile('buktifoto')) {
            $file = $request->file('buktifoto');
            $buktifoto = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'dokumentasi';
            $file->move($tujuanupload, $buktifoto);
            $laporan->buktifoto = $buktifoto;
        }

        $laporan->save();
        return redirect('/karyawan/datalaporan/' . $id_kegiatan)->with('success', 'Laporan Lembur berhasil Di Save');
    }

    function lemburlaporanviewfile($id)
    {
        $file = Laporan::findOrFail($id);

        return view('components.viewfile',compact('file'));
    }

    function lemburlaporanarchive($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->kegiatan_stat = 'selesai';
        $kegiatan->save();

        return redirect("/karyawan/datahistory")->with('success', 'Lembur berhasil Di Arsipkan dan Selesai');
    }

    function lemburlaporandelete($id_kegiatan){

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->delete();
        return redirect("/karyawan/datalaporan")->with('success', 'Laporan Lembur berhasil dihapus');
    }

    // HISTORY --------------------------------------------------------------------------------------------------------------
    function lemburhistory()
    {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('id_user',$id_user)
                            ->where('kegiatan_stat','selesai')
                            ->get();
        return view('karyawan.lemburhistory', compact('kegiatan'));
    }

    function lemburhistorydetail($id_kegiatan)
    {
        $laporan = Laporan::findOrFail($id_kegiatan);
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        return view("karyawan.lemburhistorydetail",compact('laporan','kegiatan'));
    }


}


