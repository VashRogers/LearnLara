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

// Route::get('/', 'PrincipalController@principal')->middleware(LogAcessoMiddleware::class)->name('site.index');
Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobre')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');



Route::get('/login{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::prefix('/app')->middleware('autenticacao:padrao')->group(function() {//agrupando rotas:
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    
    //fornecedor
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //produto
    Route::resource('produto', 'ProdutoController');

    //produtoDetalhe
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    //cliente
    Route::resource('cliente', 'ClienteController');

    //Pedido
    Route::resource('pedido', 'PedidoController');

    //Pedido_Produto
    Route::resource('pedido-produto', 'PedidoProdutoController');

});


Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function() {
    echo 'A rota acessada não existe <a href="'.route('site.index').'">clique aqui para ir para o inicio</a>';
});
// Route::redirect('/rota2', 'rota1');
