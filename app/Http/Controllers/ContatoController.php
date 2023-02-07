<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;
use SiteContatoSeeder;

class ContatoController extends Controller
{
    //
    public function contato() {

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo'=>'Contact (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        // SiteContato::create($request->all());
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',//qtd min e max de caracteres
            'telefone'=>'required',
            'email' => 'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:200'
        ], 
        [
            'nome.required'=>'É necessário digitar um nome',
            'nome.min' => 'É preciso no minimo 3 caracteres para nome',
            'telefone.required' => 'Digite seu telefone',
            'email.email'=>'Insira seu email',
            'motivo_contatos_id.required'=>'É necessário dar um motivo',
            'mensagem.required'=>'É obrigatório digitar uma mensagem'
        ]
    );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
