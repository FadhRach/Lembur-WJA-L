<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class BuatLemburController extends Controller
{
    function index() {

        $engineer = User::where('role', 'engineer')->get();
        $manager = User::where('role', 'manager')->get();

        return view('karyawan.buatlembur', compact('engineer','manager'));
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
        ]);

        return redirect('/karyawan/datapengajuan')->with('success', 'Lembur berhasil ditambahkan');
    }
    
}
