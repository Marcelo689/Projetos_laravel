{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    {{($errors->has("nome")) ? $errors->first('nome') : '' }}
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    {{($errors->has("telefone")) ? $errors->first('telefone') : '' }}
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    {{($errors->has("email")) ? $errors->first('email') : '' }}
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected':''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    {{($errors->has("motivo_contatos_id")) ? $errors->first('motivo_contatos_id') : '' }}
    <textarea name="mensagem" class="{{ $classe }}">{{(old('mensagem') != "") ? old('mensagem') : 'Preencha Aqui sua Mensagem '}}</textarea>
    <br>
    {{($errors->has("mensagem")) ? $errors->first('mensagem') : '' }}
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
