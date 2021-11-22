@extends('app.layouts.basico')

@section('titulo', 'pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route("pedido.create")}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                <div style="width: 90%;margin-left:auto;margin-right:auto">
                 
                        <table border="1" width='100%'>
                            <thead>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                    <tr>
                                        <td>{{ $pedido->nome}}</td>
                                        <td>{{ $pedido->cliente->nome}}</td>
                                        <td><a href="{{ route('pedido.show',['pedido'=>$pedido->id] )}}">Visualizar</a></td>
                                        <td>
                                            <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy',['pedido'=> $pedido->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <a href="#" onclick='document.getElementById("form_{{$pedido->id}}").submit()'>Excluir</a>
                                            </form>
                                            
                                        </td>
                                        <td><a href="{{ route('pedido.edit',['pedido'=>$pedido->id] )}}">Editar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pedidos->appends($request)->links()}}
                        <br>
                        Exibindo {{ $pedidos->count()}} registros por pagina de {{$pedidos->total()}}
                        <br>
                        {{ $pedidos->firstItem()}} - {{$pedidos->lastItem()}}
                </div>
        </div>
    </div>
@endsection
