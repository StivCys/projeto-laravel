{{ $msg ?? ''}}


@if(isset($produto->id))
    <form method="post" ref='update' action='{{ route('produto.update',['produto'=>$produto->id])}}'>
        @csrf
        @method('PUT')
@else
    <form method="post" ref='store' action='{{ route('produto.store')}}'>
        @csrf
@endif
    <input type="hidden" name="id" value="{{ $produto->id ?? ''}}">
    <input type='text' placeholder="nome" class='borda-preta' name='nome' value="{{ $produto->nome ?? old('nome')}}">
    {{$errors->has('nome') ? $errors->first('nome'):'' }}

    <input type='text' placeholder="descricao" class='borda-preta' name='descricao' value="{{ $produto->descricao ?? old('descricao')}}">
    {{$errors->has('descricao') ? $errors->first('descricao'):'' }}

    <input type='text' placeholder="peso" class='borda-preta' name='peso' value="{{ $produto->peso ?? old('peso')}}">
    {{$errors->has('peso') ? $errors->first('peso'):'' }}

    <select name='unidade_peso_id'>
        <option value=''>Selecione uma unidade de peso</option>
        @foreach($unidades_peso as $key=> $unidadePeso)
            <option value={{$unidadePeso->id}} {{ $unidadePeso->id == ($produto->unidade_peso_id ?? old('unidade_peso_id')) ? 'selected':'' }}>{{ $unidadePeso->unidade}} - {{ $unidadePeso->descricao }}</option>
        @endforeach
    </select>
    {{$errors->has('unidade_peso_id') ? $errors->first('unidade_peso_id'):'' }}

    <select name='unidade_id' >
        <option value=''>Selecione uma unidade de medida</option>
        @foreach($unidades as $key=> $unidade)
            <option value={{$unidade->id}} {{$unidade->id==($produto->unidade_id ?? old('unidade_peso_id')) ? 'selected':'' }}>{{ $unidade->unidade}} - {{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id'):'' }}

    

    <button type="submit" class='borda-preta'>Adicionar / Salvar</button>
</form>