@if (isset($pedido->id))
    <form action="{{ route('pedido.update', [ 'pedido'=>$pedido->id ]) }}" method="post">      
        @csrf
        @method('PUT') 
@else
    <form action="{{ route('pedido.store') }}" method="post">      
        @csrf
@endif
        
        <input type="text" name="nome" value="{{ $pedido->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            
        <button type="submit" class="borda-preta">Cadastrar</button>

    </form>