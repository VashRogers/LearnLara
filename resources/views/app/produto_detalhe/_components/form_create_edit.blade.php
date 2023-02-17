@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', [ 'produto_detalhe'=> $produto_detalhe->id ]) }}" method="post">      
        @csrf
        @method('PUT') 
@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">      
        @csrf
@endif
        
        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" class="borda-preta" placeholder="Produto ID">
            {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input type="text" name="comprimento"  value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" class="borda-preta" placeholder="Comprimento">
            {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

        <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" class="borda-preta" placeholder="largura">
            {{ $errors->has('largura') ? $errors->first('largura') : '' }}
        
        <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" class="borda-preta"         placeholder="altura">
            {{ $errors->has('altura') ? $errors->first('altura') : '' }}

        <select name="unidade_id">
                <option>--Selecione o tipo de unidade-</option>
            
            @foreach ( $unidades as $unidade )
                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>

            @endforeach
        </select>
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit" class="borda-preta">Cadastrar</button>

    </form>