@extends('app.layouts.basico')

@section('titulo', 'pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes do pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            
                <div style="width: 30%;margin-left:auto;margin-right:auto">
                    <table style='text-align:left;' border="1">
                        <tr>
                            <td>ID:</td>
                            <td>{{$pedido->id}}</td>
                        </tr>
                        <tr>
                            <td>Id do Cliente</td>
                            <td>{{$pedido->cliente_id}}</td>
                        </tr>
                        <tr>
                            <td>Nome do Cliente</td>
                            <td>{{ $pedido->cliente->nome}}</td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
@endsection
