  <form action="{{isset($cliente->id) ? route('cliente.update',['cliente'=>$cliente->id]) : route("cliente.store")}}" method="post">
        @csrf
        @if(isset($cliente->id))
            @method("PUT")
        @endif
        <input type="text" name="nome" placeholder="Nome" value="{{ $cliente->nome ?? old('nome')}}" class="borda-preta">
            {{ $errors->has('nome') ? $errors->first('nome') : ''}} 
        <button type="submit" class="borda-preta">{{isset($cliente->id) ? 'Atualizar':'Cadastrar'}}</button>
    </form>