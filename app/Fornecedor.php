<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table = "fornecedores";  //Corrigindo erro de busca no banco com nome fornecedors
    protected $fillable = ['nome', 'site', 'uf', 'email']; //define os campos a serem registrados no campo

}
