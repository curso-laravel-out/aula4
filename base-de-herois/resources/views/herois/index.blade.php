@extends('layouts.app')

<script>
function marcaIdExcluir(id) {
    document.getElementById('id').value = id;
    document.getElementById('form_excluir').submit();
}
</script>
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
                <div class="card-header">Lista Heróis</div>
                <div class="card-body">
                    <a href="/herois/novo">Novo</a> 
                    <form action="/herois/excluir" id="form_excluir" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="hidden" name="id" id='id'>

                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Identidade Secreta</th>
                                <th>Data de Criação</th>
                                <th>Ação</th>
                            </tr>
                            @foreach ($herois as $heroi)

                                    <tr>
                                            <td>{{ $heroi->id }}</td>
                                            <td>{{ $heroi->nome }}</td>
                                            <td>{{ $heroi->identidade_secreta }}</td>
                                            <td>{{ $heroi->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="/herois/detalhes/{{$heroi->id}}">Consultar</a> | 
                                                <a href="#" onclick="marcaIdExcluir({{$heroi->id}})">Excluir</a> |
                                                <a href="/herois/editar/{{$heroi->id}}">Editar</a> | 
                                            </td>
                                    </tr>
                                @endforeach 
                        </table>
                    </form>
                    {{ $herois->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
