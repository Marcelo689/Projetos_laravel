@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                <div style="width: 90%;margin-left:auto;margin-right:auto">
                    
                        <table border="1" width='100%'>
                            <thead>
                                    <th>Nome</th>
                                    <th>Site</th>
                                    <th>UF</th>
                                    <th>E-mail</th>
                                    <th>Excluir</th>
                                    <th>Editar</th>
                            </thead>
                            <tbody>
                                @foreach($fornecedores as $fornecedor)
                                    <tr>
                                        <td>{{ $fornecedor->nome}}</td>
                                        <td>{{ $fornecedor->site}}</td>
                                        <td>{{ $fornecedor->uf}}</td>
                                        <td>{{ $fornecedor->email}}</td>
                                        <td><a href="{{ route('app.fornecedor.excluir',$fornecedor->id)}}">Excluir</a></td>
                                        <td><a href="{{ route('app.fornecedor.editar',$fornecedor->id)}}">Editar</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p>Lista de produtos</p>
                                            <table border="1" style="margin:20px;">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Nome</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($fornecedor->produtos as $key => $produtos)
                                                    <tr>
                                                        <td>{{ $produtos->id}}</td>
                                                        <td>{{ $produtos->nome}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $fornecedores->appends($request)->links()}}
                        <br>
                        Exibindo {{ $fornecedores->count()}} registros por pagina de {{$fornecedores->total()}}
                        <br>
                        {{ $fornecedores->firstItem()}} - {{$fornecedores->lastItem()}}
                </div>
        </div>
    </div>
@endsection
