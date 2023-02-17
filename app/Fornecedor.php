<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //
    use SoftDeletes;
    
    protected $table = "fornecedores";  //Corrigindo erro de busca no banco com nome fornecedors
    protected $fillable = ['nome', 'site', 'uf', 'email']; //define os campos a serem registrados no campo
    //método save() serve para inserir registros;
    //método create([vai um array de objetos]); faz uma inserção no banco;
    //método find("Aqui vai uma primary key"); faz uma busca de um item especifico, pode se passar um array com os parametros desejados;

    public function produtos(){
        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
    }
}
