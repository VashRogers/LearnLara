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
//Na versão 8 para setar controller vc chama um array contento o caminho para o diretório do controller;
Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobre')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::post('/contato', 'ContatoController@contato')->name('site.contato');


Route::get('/login', function() { return 'Login'; })->name('site.login');


Route::prefix('/app')->group(function() {//agrupando rotas:
    Route::get('/clientes', function() { return 'clientes'; })->name('app.clientes');
    Route::get('/fornecedor', function() { return 'fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function() { return 'products'; })->name('app.produtos');
    Route::get('/fornecedores', 'FornecedorController@index')->name('site.fornecedor');
});


Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function() {
    echo 'A rota acessada não existe <a href="'.route('site.index').'">clique aqui para ir para o inicio</a>';
});
// Route::redirect('/rota2', 'rota1');
