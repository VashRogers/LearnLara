<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    //nao precisa usar table, mapeamento já está feito de forma nativa
    protected $fillable = [ 'produto_id', 'comprimento', 'largura', 'altura', 'unidade_id' ];
}
