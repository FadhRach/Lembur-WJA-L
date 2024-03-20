<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function indexmanager($id_user)
    {
        $user = User::findOrFail($id_user);
        return view("manager.profilemanager",["user" => $user]);
    }

    function editsavemanager($id_user, Request $request)
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
        return redirect('/manager/profile/' . $id_user)->with('success', 'Profile berhasil diubah');
    }

    function indexengineer($id_user)
    {
        $user = User::findOrFail($id_user);
        return view("engineer.profileengineer",["user" => $user]);
    }

    function editsaveengineer($id_user, Request $request)
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
        return redirect('/engineer/profile/' . $id_user)->with('success', 'Profile berhasil diubah');
    }

    function indexkaryawan($id_user)
    {
        $user = User::findOrFail($id_user);
        return view("karyawan.profilekaryawan",["user" => $user]);
    }

    function editsavekaryawan($id_user, Request $request)
    {
        $user = User::findOrFail($id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = $request->password;
        }
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
        return redirect('/karyawan/profile/' . $id_user)->with('success', 'Profile berhasil diubah');
    }
}
