@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create'); }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Id da Unidade</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome}}</td>
                                <td>{{ $produto->descricao}}</td>
                                <td>{{ $produto->fornecedor->nome}}</td>
                                <td>{{ $produto->peso . ' kg'}}</td>
                                <td>{{ $produto->unidade_id}}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? 'Não registrado'}}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? 'Não registrado'}}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? 'Não registrado'}}</td>
                                <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                                <td> <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a> </td>
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit"> Excluir </button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach($produto->pedido as $pedido)
                                    <a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">
                                        | Pedido: {{$pedido->id ?? ''}} |
                                    </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div style="max-width: 20%; max-height:20%; display:inline;">
                    {{ $produtos->appends($request)->links()}}
                    {{-- {{ $fornecedores->count()}} - Total de registro por páginas
                    {{ $fornecedores->total()}} - Total de registro das consultas
                    {{ $fornecedores->firstitem()}} - Número de Registro da página
                    {{ $fornecedores->lastitem()}} - Número do último Registro da página --}}
                    Exbiindo {{ $produtos->count()}} produtos de {{ $produtos->total()}} (de {{ $produtos->firstitem()}} a {{ $produtos->lastitem()}})
                </div>

            </div>
        </div>

    </div>

@endsection