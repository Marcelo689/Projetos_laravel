@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route("produto.create")}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                <div style="width: 90%;margin-left:auto;margin-right:auto">
                 
                        <table border="1" width='100%'>
                            <thead>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Fornecedor</th>
                                    <th>Peso</th>
                                    <th>Unidade ID</th>
                                    <th>Comprimento</th>
                                    <th>Largura</th>
                                    <th>Altura</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                            </thead>
                            <tbody>
                                @foreach($produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->nome}}</td>
                                        <td>{{ $produto->descricao}}</td>
                                        <td>{{ $produto->fornecedor->nome}}</td>
                                        <td>{{ $produto->peso}}</td>
                                        <td>{{ $produto->unidade_id}}</td>
                                        <td>{{ $produto->ItemDetalhe->comprimento ?? ''}}</td>
                                        <td>{{ $produto->ItemDetalhe->largura ?? ''}}</td>
                                        <td>{{ $produto->ItemDetalhe->altura ?? ''}}</td>
                                        <td><a href="{{ route('produto.show',['produto'=>$produto->id] )}}">Visualizar</a></td>
                                        <td>
                                            <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy',['produto'=> $produto->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <a href="#" onclick='document.getElementById("form_{{$produto->id}}").submit()'>Excluir</a>
                                            </form>
                                            
                                        </td>
                                        <td><a href="{{ route('produto.edit',['produto'=>$produto->id] )}}">Editar</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12">
                                            <p>Pedidos</p>
                                            @foreach($produto->pedidos as $pedido)
                                            <a href="{{ route('pedido-produto.create',['pedido'=>$pedido->id])}}">
                                                Pedido {{$pedido->id}}
                                            </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $produtos->appends($request)->links()}}
                        <br>
                        Exibindo {{ $produtos->count()}} registros por pagina de {{$produtos->total()}}
                        <br>
                        {{ $produtos->firstItem()}} - {{$produtos->lastItem()}}
                </div>
        </div>
    </div>
@endsection
