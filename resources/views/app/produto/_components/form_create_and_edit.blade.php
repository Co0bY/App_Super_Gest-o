@if (isset($produto->id))
<form action="{{route('produto.update', ['produto' => $produto->id])}}" method="post">
    @csrf
    @method('PUT')
@else
<form action="{{route('produto.store')}}" method="post">
    @csrf
@endif
<input type="text" name="nome" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}" class="borda-preta">
{{$errors->has('nome') ? $errors->first('nome') : '' }}
<input type="text" name="descricao" placeholder="Descrição" value="{{$produto->descricao ?? old('descricao')}}" class="borda-preta">
{{$errors->has('descricao') ? $errors->first('descricao') : '' }}
<input type="number" name="peso" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}" class="borda-preta">
{{$errors->has('peso') ? $errors->first('peso') : '' }}

<select name="unidade_id" id="">
<option value="">--- Selecione a Unidade de Medida ---</option>
@foreach ($unidades as $unidade)
    <option value="{{ $unidade->id }}" {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
@endforeach
</select>
{{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<select name="fornecedor_id" id="">
<option value="">--- Selecione um Fonrnecedor ---</option>
@foreach ($fornecedores as $fornecedor)
    <option value="{{ $fornecedor->id }}" {{($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>
@endforeach
</select>
{{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>
</form>