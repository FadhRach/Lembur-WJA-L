<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarKaryawanController extends Controller
{
    function index()
    {
        $user = User::all();
        return view("engineer.daftarkaryawan",["user" => $user]);
    }

    function tambah()
    {
        $user = User::all();
        return view("engineer.daftarkaryawantambah",["user" => $user]);
    }

    function tambahsave(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'role' => 'required',
            'mitra' => 'required',
            'jabatan' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ],[
            'name.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password'=> 'Password harus diisi',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password',
            'role.required' => 'Role Harus Diisi',
            'mitra.required' => 'Mitra Harus Diisi',
            'jabatan.required' => 'Jabatan Harus Diisi',
            'nik.required' => 'NIK/NIP Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'no_telp.required' => 'Nomor Telpon Harus Diisi',
        ]);

        // Default foto
        $foto = 'Profile_Icon.png'; // Ganti 'default.jpg' dengan nama file foto default Anda

        // Jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'img';
            $file->move($tujuanupload, $foto);
        }

        // Buat pengguna baru dengan foto yang disimpan
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'role'=> $request->role,
        'mitra'=> $request->mitra,
        'jabatan'=> $request->jabatan,   
        'nik'=> $request->nik,
        'alamat'=> $request->alamat,
        'no_telp'=> $request->no_telp,
        'foto' => $foto,
        ]);

        return redirect('/engineer/daftarkaryawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        return view("engineer.daftarkaryawanedit",["user" => $user]);
    }

    function editsave($id_user, Request $request)
    {   
        $user = User::findOrFail($id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = $request->password;
        }
        $user->role = $request->role;
        $user->mitra = $request->mitra;
        $user->jabatan = $request->jabatan;
        $user->nik = $request->nik;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'img';
            $file->move($tujuanupload, $foto);
            $user->foto = $foto;
        }

        $user->save();
        return redirect('/engineer/daftarkaryawan')->with('success', 'Data karyawan berhasil diubah');
    }



    function delete($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();
        
        return redirect('/engineer/daftarkaryawan')->with('success', 'Data karyawan berhasil dihapus');
    }

    function cari(Request $request) 
    {
        $cari = $request->cari;

        $user = User::where('name', 'like', "%".$cari."%")
                ->orWhere('email', 'like', "%".$cari."%")
                ->orWhere('role', 'like', "%".$cari."%")
                ->orWhere('jabatan', 'like', "%".$cari."%")
                ->orWhere('mitra', 'like', "%".$cari."%")
                ->orWhere('nik', 'like', "%".$cari."%")
                ->orWhere('alamat', 'like', "%".$cari."%")
                ->orWhere('no_telp', 'like', "%".$cari."%")
                ->paginate();

        return view('/engineer/daftarkaryawan', ['user' => $user]);
    }
}
