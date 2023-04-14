{{-- $slot imprime o html inserido entre as tags do component e endcomponent--}}
{{ $slot }}
{{-- $classe  vem como parametro no array associativo passado na chamada do component--}}
{{--
@if($errors->any())
    <div style="position:relative;top:0px;left:0px;width:100%;background:red ;"  >
        <pre>
            @foreach ($errors->all() as $erro)
                {{ $erro}}<br>
            @endforeach
        </pre>
    </div>
@endif
--}}
<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}">
        <span style=color:red>{{$errors->has('nome') ? $errors->first('nome'):''}}</span>
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{ $classe }}" value="{{ old('telefone') }}">
    <span style=color:red>{{$errors->has('telefone') ? $errors->first('telefone'):''}}</span>
    <br>
    <input type="text" name="email" placeholder="E-mail" class="{{ $classe }}" value="{{ old('email') }}">
    <span style=color:red>{{$errors->has('email') ? $errors->first('email'):''}}</span>
    <br>
    <select class="{{ $classe }}" name="motivo_contatos_id" >
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key=> $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id')==$motivo_contato->id ? 'selected':'' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
        <span style=color:red>{{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}</span>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="deixe aqui sua mensagem">{{old('mensagem')}}</textarea>
        <span style=color:red>{{$errors->has('mensagem') ? $errors->first('mensagem'):''}}</span>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
