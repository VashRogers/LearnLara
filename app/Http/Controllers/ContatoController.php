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
            'nome' => 'required|min:3|max:40',//qtd min e max de caracteres
            'telefone'=>'required',
            'email' => 'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:200'
        ]);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
