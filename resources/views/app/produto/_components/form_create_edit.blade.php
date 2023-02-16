@if (isset($produto->id))
    <form action="{{ route('produto.update', [ 'produto'=>$produto->id ]) }}" method="post">      
        @csrf
        @method('PUT') 
@else
    <form action="{{ route('produto.store') }}" method="post">      
        @csrf
@endif
        
        <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input type="text" name="descricao"  value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta" placeholder="Descrição">
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" class="borda-preta" placeholder="Peso">
            {{ $errors->has('peso') ? $errors->first('peso') : '' }}

        <select name="unidade_id">
                <option>--Selecione o tipo de unidade-</option>
            
            @foreach ( $unidades as $unidade )
                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>

            @endforeach
        </select>
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit" class="borda-preta">Cadastrar</button>

    </form>