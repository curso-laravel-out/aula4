<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;

class HeroiController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() === 'GET') {
            return Heroi::all();
        }
        $heroi                     = new Heroi();
        $heroi->name               = $request->nome;
        $heroi->identidade_secreta = $request->identidade;
        $heroi->origem             = $request->origem;
        $heroi->foto               = $request->foto;
        $heroi->save();
        return redirect('/herois');
    }
    public function update()
    {
        return 'atualizando o heroi';
    }
    public function delete()
    {
        return 'removendo o heroi';
    }
}
