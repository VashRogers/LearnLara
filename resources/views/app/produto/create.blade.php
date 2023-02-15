@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        
        <div class="menu">
            <ul>
                <li> <a href="{{ route('produto.index') }}">Voltar</a> </li>
                <li> <a href="">Consulta</a> </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto " >
                <form action="" method="post">
                    <input type="hidden" name="id" value="" >
                    @csrf
                    
                    <input type="text" name="nome" value="" class="borda-preta" placeholder="Nome">
                    
                    <input type="text" name="descricao"  value="" class="borda-preta" placeholder="Descrição">

                    <input type="text" name="peso" value="" class="borda-preta" placeholder="Peso">
                    
                    <select name="undidade_id">
                        <option>--Selecione o tipo de unidade-</option>
                        @foreach ( $unidades as $unidade )
                            <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>

                        @endforeach
                    </select>
                    
                    <button type="submit" class="borda-preta">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>

@endsection