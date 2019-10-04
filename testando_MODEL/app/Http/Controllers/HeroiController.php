<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroiController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() === 'GET') {
            return view('herois.index', ['herois' => Heroi::paginate(3)]);
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

    public function mostra(Request $request)
    {
        if($request->id) {
            $heroi = Heroi::find($request->id);
            return view('herois.details', compact('heroi'));
        }
    }

    public function update()
    {
        return 'atualizando o heroi';
    }
    
    public function delete(Request $request)
    {
        DB::table('herois')->where('id', $request->id)->delete();
        return redirect('/herois');
    }
}


// $type = $request->file('foto')->extension();
// $data = file_get_contents($request->file('foto')->path());
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// $heroi->foto = $base64;
