@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create'); }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome}}</td>
                                <td><a href="{{route('cliente.show', ['cliente' => $cliente->id])}}">Visualizar</a></td>
                                <td> <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a> </td>
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit"> Excluir </button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div style="max-width: 20%; max-height:20%; display:inline;">
                    {{ $clientes->appends($request)->links()}}
                    {{-- {{ $fornecedores->count()}} - Total de registro por páginas
                    {{ $fornecedores->total()}} - Total de registro das consultas
                    {{ $fornecedores->firstitem()}} - Número de Registro da página
                    {{ $fornecedores->lastitem()}} - Número do último Registro da página --}}
                    Exbiindo {{ $clientes->count()}} clientes de {{ $clientes->total()}} (de {{ $clientes->firstitem()}} a {{ $clientes->lastitem()}})
                </div>

            </div>
        </div>

    </div>

@endsection