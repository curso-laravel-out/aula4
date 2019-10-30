@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $erro)
                        <p>{{$erro}}</p>
                    @endforeach
                </div>
            @endif
            <div class="card">
                <div class="card-header">Ficha do Herói</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="max-width: 30%; overflow: hidden;">
                            <img src="data:image/jpg;base64,{{$heroi->foto}}" alt="foto do herói" height=200px>
                        </div>
                        <div class="col">
                            <p><b>Nome:</b> {{$heroi->nome}}</p>
                            <p><b>Identidade secreta:</b> {{$heroi->identidade_secreta}}</p>
                            <p><b>Origem:</b> {{$heroi->origem}}</p>
                            <p><b>Força:</b> {{$heroi->forca}}</p>
                            <p><b>Terráqueo?</b> {{ $heroi->terraqueo }} </p>
                            <p><b>Pode voar?</b> {{ $heroi->pode_voar }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
