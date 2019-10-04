<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;

class HeroiController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() === 'GET') {
            if($request->id) {
                $heroi = Heroi::find($request->id);
                return "<img src='$heroi->foto'/>";
            }

            return Heroi::all();
        }

        $heroi                     = new Heroi();
        $heroi->name               = $request->nome;
        $heroi->identidade_secreta = $request->identidade;
        $heroi->origem             = $request->origem;

        $type = $request->file('foto')->extension();
        $data = file_get_contents($request->file('foto')->path());
        $heroi->foto = "data:image/$type;base64,".base64_encode($data);
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


// $type = $request->file('foto')->extension();
// $data = file_get_contents($request->file('foto')->path());
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// $heroi->foto = $base64;
