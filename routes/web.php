<?php

use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Seria algo similar ao navigator do React Native, utilizar essas rotas embutidas no server. 
Route::get('/', 'PrincipalController@principal');//Na versão 8 para setar controller vc chama um array contento o caminho para o diretório do controller;

Route::get('/sobre-nos', 'SobreNosController@sobre');

Route::get('/contato', 'ContatoController@contato');

Route::get('/contato/{nome}/{local}', function ($nome, $local) {
    echo "We are here: " . $nome . " em " . $local;
});
// Route::post('/testePOST' , function () { //Não deu certo esse teste rsrs
//     return "Isso é uma rota post";
// });