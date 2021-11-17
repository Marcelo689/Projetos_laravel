  <form action="{{isset($produto->id) ? route('produto.update',['produto'=>$produto->id]) : route("produto.store")}}" method="post">
        @csrf
        @if(isset($produto->id))
            @method("PUT");
        @endif
        <input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome')}}" class="borda-preta">
            {{ $errors->has('nome') ? $errors->first('nome') : ''}}
        <input type="text" name="descricao" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao')}}" class="borda-preta">
            {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}
        <input type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso')}}" class="borda-preta">
            {{ $errors->has('peso') ? $errors->first('peso') : ''}}
        <select name="unidade_id" >
            <option value="">Selecione a unidade de medida</option>
            @foreach($unidades as $unidade)
                <option value="{{$unidade->id}}" {{($produto->unidade_id ?? (old('unidade_id')) == $unidade->id ) ? ('selected') : ('')}}>{{$unidade->descricao}}</option>
            @endforeach
        </select>
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}    
        <button type="submit" class="borda-preta">{{isset($produto->id) ? 'Atualizar':'Cadastrar'}}</button>
    </form>