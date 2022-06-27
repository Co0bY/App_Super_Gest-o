@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create'); }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID do Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id}}</td>
                                <td>{{ $pedido->cliente_id}}</td>
                                <td><a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a></td>
                                <td> <a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a> </td>
                                <td>
                                    <form id="form_{{$pedido->id}}" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit"> Excluir </button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div style="max-width: 20%; max-height:20%; display:inline;">
                    {{ $pedidos->appends($request)->links()}}
                    {{-- {{ $fornecedores->count()}} - Total de registro por páginas
                    {{ $fornecedores->total()}} - Total de registro das consultas
                    {{ $fornecedores->firstitem()}} - Número de Registro da página
                    {{ $fornecedores->lastitem()}} - Número do último Registro da página --}}
                    Exbiindo {{ $pedidos->count()}} pedidos de {{ $pedidos->total()}} (de {{ $pedidos->firstitem()}} a {{ $pedidos->lastitem()}})
                </div>

            </div>
        </div>

    </div>

@endsection