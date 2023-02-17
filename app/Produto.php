<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    // protected $table = "produtos";
    protected $fillable = [ 'nome', 'descricao', 'peso', 'unidade_id' ];

    public function produtoDetalhe () {
        return $this->hasOne('App\ProdutoDetalhe');//Produto tem 1 produtoDetalhe, rel 1x1;
    }
}
