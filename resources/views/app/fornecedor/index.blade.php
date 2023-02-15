@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>
        
        <div class="menu">
            <ul>
                <li> <a href="">Novo</a> </li>
                <li> <a href="">Consulta</a> </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto " >
                <form action="" method="post">

                    <input type="text" name="nome" class="borda-preta" placeholder="Nome">
                    <input type="text" name="site" class="borda-preta" placeholder="Site">
                    <input type="text" name="uf" class="borda-preta" placeholder="Estado">
                    <input type="text" name="email" class="borda-preta" placeholder="E-Mail">
                    <button type="submit" class="borda-preta">Pesquisar</button>

                </form>
            </div>
        </div>
    </div>

@endsection