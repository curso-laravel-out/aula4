@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuários</div>

                <div class="card-body">
                    <ol>
                    @foreach ($usu as $usuario)
                        <li>{{$usuario->name}}</li>
                    @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
