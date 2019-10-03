@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo Herói</div>

                <div class="card-body">
                    <form action="/herois" method="post">
                        @csrf
                        <p>Nome:</p>
                        <input type="text" name="nome" id="nome">
                        <p>Identidade secreta:</p>
                        <input type="text" name="identidade" id="identidade">
                        <p>Origem:</p>
                        <input type="text" name="origem" id="origem">
                        <p>Foto:</p>
                        <input type="file" name="foto" id="foto">
                        <p></p>
                        <p>
                            <input type="submit" value="Gravar!">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
