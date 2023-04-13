<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
</head>
<body>
    <h1>Fornecedores</h1>
    {{-- Comentario descartado --}}
    {{-- Sintax Blade  --}}
    {{ "aaaaaaaa" }} 

    <?= "Texto de teste" ?>    

@php
//--sintax pura php  
echo " BBBBBBBBBB";

@endphp



<br>

@if(count($fornecedores)==0)
    <h3>Não Existem fornecedores</h3>
@elseif(count($fornecedores)>2)
    <h3>Existem mais de 2 fornecedores total {{ count($fornecedores)}}</h3>  
@else
<h3>Não existem apenas  {{ count($fornecedores)}} fornecedores </h3>
@endif



@unless ($fornecedores[0]['ativo']=='S')
    Fornecedor Inativo
    
@endunless

{{-- GAMBIARRA PARA CRIAR UMA VARIAVEL NA VIEW SEM QUEO O BLADE IMPRIMA ELA AO MESMO TEMPO --}}
{{  '', $x=2}}

{{-- @isset e @empty--}}

@isset($fornecedores )
    @isset($fornecedores[$x]['nome'])
        Nome definido : {{ $fornecedores[$x]['nome'] }}
        @empty($fornecedores[$x]['nome'])
            Nome vazio
        @endempty
        <br>
        {{-- Valor Default caso esteja vazio ou null --}}
        Cnpj : {{$fornecedores[$x]['cnpj'] ?? 'Valor não informado'}}
    @endisset


@endisset

{{--Operador Ternario no Blade não existe ate pelo menos nessa versao--}}

{{-- @switch @case @default--}}
<br> Cidade :
@switch($fornecedores[$x]['ddd'])
    @case('41')
        Curitiba
        @break
    @case('11')
        São Paulo
        @break
    @default
        Desconhecido
@endswitch
<hr>
{{-- @for --}}
<p>Laço for</p>
@for ($i = 0; $i < count($fornecedores); $i++)
    <br>
    {{$i }}
    :
    {{$fornecedores[$i]['nome']}}
@endfor
<hr>
{{-- laço while--}}
<p>Laço while</p>
@php $i=0 @endphp
@while (isset($fornecedores[$i]))
<br>
    Fornecedor = {{$fornecedores[$i]['nome']}}
    @php $i++ @endphp
@endwhile

<hr>
{{-- foreach--}}
<p>Laço foreach</p>
@foreach ($fornecedores as $item)
    <br>
    @if($loop->first)
        Primeira  iteração 
    @endif
    <br>
    Iteracção atual : {{$loop->iteration}}
    <br>
    fornecedor: {{$item['nome']}}
    @if($loop->last)
        <br>Ultima iteração 
        <br>
        Total de registros {{$loop->count}}
    @endif
@endforeach

<hr>
{{-- forelse--}}
<p>Laço forelse</p>
@php
 // forçando a passagem de um array vazio para testar o forelse
//  $fornecedores=[];    
@endphp
@forelse ($fornecedores as $item=>$valor)
    <br>
    Iteracção atual : {{$loop->iteration}}
    fornecedor: {{$valor['nome']}}
    @empty
    Não existe resgistros
@endforelse
<br>
@php
exit('saindo');    
@endphp


</body>
</html>