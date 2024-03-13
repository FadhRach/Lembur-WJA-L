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

    function indexengineer()
    {

    }

    function indexkaryawan()
    {

    }
}
