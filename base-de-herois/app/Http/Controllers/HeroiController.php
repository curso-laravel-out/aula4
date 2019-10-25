<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;

class HeroiController extends Controller
{
    public function index()
    {
        return \App\Heroi::select(['id', 'nome', 'identidade_secreta'])->get();
    }

    public function create()
    {
        return view('herois.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nome'               => 'required|alpha|max:100|min:3',
            'identidade_secreta' => 'max:255',
            'origem'             => 'alpha|max:100',
            'foto'               => 'file',
        ]);
        
        $heroi = new Heroi();
        $heroi->nome               = $req->nome;
        $heroi->identidade_secreta = $req->identidade_secreta;
        $heroi->origem             = $req->origem;
        $heroi->forca              = $req->forca;
        $heroi->terraqueo          = ($req->terraqueo && $req->terraqueo === 'on' ) ? true : false;
        $heroi->pode_voar          = ($req->pode_voar && $req->pode_voar === 'on' ) ? true : false;

        // convertendo arquivo binário para base64
        $path = $req->file('foto')->getRealPath();
        $foto = file_get_contents($path);
        $base64 = base64_encode($foto);

        $heroi->foto               = $base64;
        $heroi->save();

        return redirect('/herois');
    }
}
