@extends('app.layouts.basico')
@section('titulo','Cadastro de Produtos')
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina" style='height:20px;padding-top:50px;padding-bottom:30px;'>
        <h1>Produtos - Adicionar</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href='{{route('produto.index')}}'>Voltar</a></li>
            <li><a href='{{route('produto.index')}}'>Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style='width:30%;margin-left:auto;margin-right:auto;'>
            @component('app.produto._componentes.form_create_edit',['unidades_peso'=>$unidades_peso,'unidades'=>$unidades])
            @endcomponent
        </div>
    </div>
</div>

@endsection