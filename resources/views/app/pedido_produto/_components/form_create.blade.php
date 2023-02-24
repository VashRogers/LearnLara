
<form action="{{ route('pedido-produto.store', ['pedido' => $pedido, 'produtos' => $produtos]) }}" method="post">      
    @csrf
    <select name="produto_id">
        <option>--Selecione um Produto</option>

    @foreach ( $produtos as $key => $produto )
        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>

    @endforeach
    </select>
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
        
    <button type="submit" class="borda-preta">Cadastrar</button>

</form>