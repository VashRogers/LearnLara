<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{   
    protected $table = 'produtos';
    protected $fillable = [ 'nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id' ];

    public function itemDetalhe () {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');//Produto tem 1 produtoDetalhe, rel 1x1;
    }

    public function fornecedor() {
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
