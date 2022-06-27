@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
                <p> Adicionar Produtos ao Pedido </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhe do Pedido</h4>
            <p>ID do Pedido: {{$pedido->id}}</p>
            <p>Cliente: {{$pedido->cliente_id}}</p>
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <h4>Itens do Pedido</h4>
                <table border="1 solid" style="width: 100%">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome do Produto</td>
                            <td>Data de Inclusão</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->created_at->format('d/m/y')}}</td>
                            <td>
                                <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form-create', ['pedido' => $pedido, 'produtos' => $produtos, 'pedido_id' => $pedido->id])
                    
                @endcomponent
            </div>
        </div>
        
    </div>

@endsection