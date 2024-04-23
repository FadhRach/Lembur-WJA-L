<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburManagerController extends Controller
{
    // PENGAJUAN --------------------------------------------------------------------------------------------------------------
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

    // LAPORAN --------------------------------------------------------------------------------------------------------------
    function lemburlaporan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('ptgs_manager', $id_user)
                            ->where('statacc_manager', 'diterima')
                            ->where('statacc_engineer', 'diterima')
                            ->where('kegiatan_stat', 'progress')
                            ->get();
        return view("manager.lemburlaporan", ["kegiatan"=>$kegiatan]);
    }

    function lemburlaporandetail($id_kegiatan) {

        $laporan = Laporan::findOrFail($id_kegiatan);
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        return view("manager.lemburlaporandetail",compact('laporan','kegiatan'));
    }

    function lemburlaporanterima($id_kegiatan, Request $request) {
        $laporan = laporan::findOrFail($id_kegiatan);
        $laporan->cek_manager = 'selesai';
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
        return redirect('/manager/datalaporan/' . $id_kegiatan)->with('success', 'Laporan Lembur berhasil Di Approve');
    }

    function lemburlaporanrevisi($id_kegiatan, Request $request) {
        $laporan = laporan::findOrFail($id_kegiatan);
        $laporan->cek_manager = 'revisi';
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
        return redirect('/manager/datalaporan/' . $id_kegiatan)->with('success', 'Laporan Lembur berhasil Di Nyatakan Revisi');
    }

    function lemburlaporanviewfile($id)
    {
        $file = Laporan::findOrFail($id);

        return view('components.viewfile',compact('file'));
    }
   
    // DATA LEMBUR --------------------------------------------------------------------------------------------------------------
    function lemburdata() {
        $kegiatan = Kegiatan::all();
        return view('engineer.lemburdata', compact('kegiatan'));
    }
}
