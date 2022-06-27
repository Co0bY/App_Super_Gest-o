@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Vizualizar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 60%; margin-left:auto; margin-right:auto;">
                    <table border="1px" style="text-align: left;">
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Fornecedor</td>
                            <td>Descrição</td>
                            <td>Peso</td>
                            <td>Unidade de Medida</td>
                        </tr>
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->peso}} KG</td>
                            <td>{{$produto->unidade_id}}</td>
                        </tr>
                        
                    </table>
            </div>
        </div>
        
    </div>

@endsection