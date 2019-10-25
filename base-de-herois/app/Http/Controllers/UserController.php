<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // usando Query Builder
    public function index(Request $req)
    {
        $req->validate([
            'nome' => 'nullable|alpha|min:3|max:255'
        ]);

        $qb = DB::table('users')->select(['name', 'id']);
        if($req->nome) {
            $qb->where('name', 'like', "$req->nome%");
        }
        $usuarios = $qb->get();
        return view('usuarioslist', ['usu' => $usuarios]);
    }

    // usando Model Elloquent
    public function index2(Request $req) 
    {
        $req->validate([
            'nome' => 'nullable|alpha|min:3|max:255'
        ]);

        $qb = User::select(['name', 'id']);
        if($req->nome) {
            $qb->where('name', 'like', "$req->nome%");
        }
        $usuarios = $qb->get();

        return view('usuarioslist', ['usu' => $usuarios]);
    }
}
