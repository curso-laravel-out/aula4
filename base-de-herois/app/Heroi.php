<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heroi extends Model
{
    // se fosse preciso configurar fora do padrao
    // protected $table = 'aneis';
    // protected $primaryKey = 'id_herois';

    // defaults
    // protected $table = 'herois';
    // protected $primaryKey = 'id';

    public function getTerraqueoAttribute($valor)
    {
        return $valor ? 'Sim' : 'Não';
    }

    public function getPodeVoarAttribute($valor)
    {
        return $valor ? 'Sim' : 'Não';
    }

}
