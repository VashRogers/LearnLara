<?php

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
Route::get('/', function () {
    // return view('welcome');
    return "Hello World";
});

Route::get('/sobre-nos', function() {
    return "Aplicação para aprendizado de laravel 7";
});

Route::get('/roger', function () {
    return "Eu sou Roger, o cara que manda nisso tudo!";
});

// Route::post('/testePOST' , function () { //Não deu certo esse teste rsrs
//     return "Isso é uma rota post";
// });