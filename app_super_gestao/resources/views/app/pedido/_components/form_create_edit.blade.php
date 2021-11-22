  <form action="{{isset($pedido->id) ? route('pedido.update',['pedido'=>$pedido->id]) : route("pedido.store")}}" method="post">
        @csrf
        @if(isset($pedido->id))
            @method("PUT")
        @endif
        <select name="cliente_id" >
            <option value="">Selecione um Cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}" {{($pedido->cliente_id ?? (old('cliente_id')) == $cliente->id ) ? ('selected') : ('')}}>{{$cliente->nome}}</option>
            @endforeach
        </select>
        {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}   
        <button type="submit" class="borda-preta">{{isset($pedido->id) ? 'Atualizar':'Cadastrar'}}</button>
    </form>