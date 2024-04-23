<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburEngineerController extends Controller
{
    // PENGAJUAN --------------------------------------------------------------------------------------------------------------
    function lemburpengajuan() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('id_user','!=', $id_user)
                            ->where('ptgs_engineer', $id_user)
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

    // LAPORAN --------------------------------------------------------------------------------------------------------------
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
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        return view("engineer.lemburlaporandetail",compact('laporan','kegiatan'));
    }

    function lemburlaporanterima($id_kegiatan, Request $request) {
        $laporan = laporan::findOrFail($id_kegiatan);
        $laporan->cek_engineer = 'selesai';
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
        return redirect('/engineer/datalaporan/' . $id_kegiatan)->with('success', 'Laporan Lembur berhasil Di Approve');
    }

    function lemburlaporanrevisi($id_kegiatan, Request $request) {
        $laporan = laporan::findOrFail($id_kegiatan);
        $laporan->cek_engineer = 'revisi';
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
        return redirect('/engineer/datalaporan/' . $id_kegiatan)->with('success', 'Laporan Lembur berhasil Di Nyatakan Revisi');
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

        return redirect("/engineer/datalembur")->with('success', 'Lembur berhasil Di Arsipkan dan Selesai');
    }

    // DATA LEMBUR --------------------------------------------------------------------------------------------------------------
    function lemburdata() {
        $id_user = Auth::user()->id_user;
        $kegiatan = Kegiatan::where('ptgs_engineer',$id_user)
                            ->get();
        return view('engineer.lemburdata', compact('kegiatan'));
    }

    function lemburdatadetail($id_kegiatan) {

        $laporan = Laporan::findOrFail($id_kegiatan);
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        return view("engineer.lemburdatadetail",compact('laporan','kegiatan'));
    }
}
