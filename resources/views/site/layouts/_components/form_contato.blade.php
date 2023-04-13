{{-- $slot imprime o html inserido entre as tags do component e endcomponent--}}
{{ $slot }}
{{-- $classe  vem como parametro no array associativo passado na chamada do component--}}

<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{ $classe }}" value="{{ old('telefone') }}">
    <br>
    <input type="text" name="email" placeholder="E-mail" class="{{ $classe }}" value="{{ old('email') }}">
    <br>
    <select class="{{ $classe }}" name="motivo_contato" >
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key=> $motivo_contato)
            <option value="{{$key}}" {{ old('motivo_contato')==$key ? 'selected':'' }}>{{$motivo_contato}}</option>
        @endforeach
        
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="deixe aqui sua mensagem">{{old('mensagem')}}</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

<div style="position:relative;top:0px;left:0px;width:100%;background:red ;overflow:auto; height:300px;"  >
    <pre>
        {{
            print_r($errors)            
        }}
    </pre>
</div>