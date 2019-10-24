<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = DB::table('users')->select(['name'])->get();
        return view('usuarioslist', ['usu' => $usuarios]);
    }
}
