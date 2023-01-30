<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fornecedor</title>
</head>
<body>
    <h3>Welcome Fornecedor</h3>{{--Comentário numa view, esse comment é descartado pelo interpretador do Blade --}}
    
    @php
        //Codificação pura php;   

    @endphp

    {{-- @dd($fornecedores)//O dd para a execução do código onde ele foi escrito --}}

    @if(count($fornecedores) > 0 && count($fornecedores) < 10)
        <h1>There's some fornecedores</h1>
    @elseif(count($fornecedores) > 10)
        <h1>There's um monte de fornecedores</h1>
    @endif
    <br>

    @isset($fornecedores)
        <h2>Fornecedores isset!</h2>        
    @endisset

    @empty($varVoid)
        <h1>Variavel vazia</h1>
    @endempty

    @php
        $var = null;
        $auxVar = $var ?? "Nao existe";
        echo $auxVar;
    @endphp
    
    {{-- sintax blade possui todas as estruturas de dados(for, if else, switch case, foreach, etc...) do php normal imbutidas em uma view blade --}}
    
</body>
</html>