<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class BuatkanLemburController extends Controller
{
    function indexbuatlemburkaryawan() 
    {
        $karyawan = User::where('role', 'karyawan')->get();
        $engineer = User::where('role', 'engineer')->get();

        return view('manager.buatkanlemburkaryawan', compact('karyawan','engineer'));
    }
    function tambahlemburkaryawan(Request $request) {
        $request->validate([
            'id_user' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'lama_kegiatan' => 'required',
            'ptgs_engineer' => 'required',
            'ptgs_manager' => 'required',
        ],[
            'id_user.required' => 'Nama Harus Diisi',
            'kegiatan.required' => 'kegiatan Harus Diisi',
            'deskripsi'=> 'deskripsi harus diisi',
            'lokasi.required' => 'lokasi harus diisi',
            'tgl_awal.required' => 'tanggal awal lembur Harus Diisi',
            'tgl_akhir.required' => 'tanggal akhir lembur Harus Diisi',
            'lama_kegiatan.required' => 'lama_kegiatan Harus Diisi',
            'ptgs_engineer.required' => 'Petugas Engineer Harus Diisi',
            'ptgs_manager.required' => 'Petugas Manager Harus Diisi',
        ]);

        Kegiatan::create([
        'id_user' => $request->id_user,
        'kegiatan' => $request->kegiatan,
        'deskripsi' => $request->deskripsi,
        'lokasi' => $request->lokasi,
        'tgl_awal'=> $request->tgl_awal,
        'tgl_akhir'=> $request->tgl_akhir,
        'ptgs_engineer'=> $request->ptgs_engineer,
        'ptgs_manager'=> $request->ptgs_manager,
        'lama_kegiatan'=> $request->lama_kegiatan,
        'statacc_engineer'=> 'diterima',
        'statacc_manager'=> 'diterima',
        'kegiatan_stat'=> 'laporan',
        ]);

        return redirect('/manager/datalaporan')->with('success', 'Buat Lembur Untuk Karyawan berhasil ditambahkan');
    }

    function indexbuatlemburengineer() 
    {
        $engineer = User::where('role', 'engineer')->get();

        return view('manager.buatkanlemburengineer', compact('engineer'));
    }

    function tambahlemburengineer(Request $request) {
        $request->validate([
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'lama_kegiatan' => 'required',
        ],[

            'kegiatan.required' => 'kegiatan Harus Diisi',
            'deskripsi'=> 'deskripsi harus diisi',
            'lokasi.required' => 'lokasi harus diisi',
            'tgl_awal.required' => 'tanggal awal lembur Harus Diisi',
            'tgl_akhir.required' => 'tanggal akhir lembur Harus Diisi',
            'lama_kegiatan.required' => 'lama_kegiatan Harus Diisi',
        ]);

        Kegiatan::create([
        'id_user' => $request->id_user,
        'kegiatan' => $request->kegiatan,
        'deskripsi' => $request->deskripsi,
        'lokasi' => $request->lokasi,
        'tgl_awal'=> $request->tgl_awal,
        'tgl_akhir'=> $request->tgl_akhir,
        'ptgs_engineer'=> $request->id_user,
        'ptgs_manager'=> $request->ptgs_manager,
        'lama_kegiatan'=> $request->lama_kegiatan,
        'statacc_engineer'=> 'diterima',
        'statacc_manager'=> 'diterima',
        'kegiatan_stat'=> 'laporan',
        ]);

        return redirect('/manager/datalaporan')->with('success', 'Buat Lembur Untuk Engineer berhasil ditambahkan');
    }
}
