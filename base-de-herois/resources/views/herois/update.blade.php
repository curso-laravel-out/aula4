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
                <div class="card-header">Edita Herói</div>

                <div class="card-body">
                    <form action="{{ route("herois.salvar") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$heroi->id}}">

                        <p>Nome:</p>
                        <input type="text" name="nome" value="{{$heroi->nome}}">
                        <p>Identidade secreta:</p>
                        <input type="text" name="identidade_secreta" value="{{$heroi->identidade_secreta}}">
                        <p>Origem:</p>
                        <input type="text" name="origem" value="{{$heroi->origem}}">
                        <p>Força:</p>
                        <select name="forca" id="forca" value="{{$heroi->forca}}">
                            <option value="forte">Forte!</option>
                            <option value="média">Média.</option>
                            <option value="fraca">Fraca...</option>
                        </select>
                        <p>Terráqueo?
                            <input type="checkbox" name="terraqueo"  value="{{$heroi->terraqueo}}">
                        </p>
                        <p>Pode voar?
                            <input type="checkbox" name="pode_voar" value="{{$heroi->pode_voar}}">
                        </p>
                        <p>Foto:</p>
                        <p>
                            <input type="file" name="foto" id="foto">
                        </p>

                        <input type="submit" value="Salvar!">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
