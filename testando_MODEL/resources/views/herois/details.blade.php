@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dados do Herói</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <img src="{{$heroi->foto}}" alt="{{$heroi->name}}" style="max-width: 70%;">
                        </div>
                        <div class="col">
                        <p><strong>Nome: </strong>{{$heroi->name}}</p>
                        <p><strong>Identidade secreta: </strong>{{$heroi->identidade_secreta}}</p>
                        <p><strong>Origem: </strong>{{$heroi->origem}}</p>
                        <p><strong>Data inserção: </strong>{{$heroi->created_at}}</p>
                        <p><strong>Data alteração: </strong>{{$heroi->updated_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
