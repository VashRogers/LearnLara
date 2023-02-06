<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
class ContatoController extends Controller
{
    //
    public function contato() {

        $motivo_contatos = [
            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        return view('site.contato', ['titulo'=>'Contact (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        // SiteContato::create($request->all());
        $request->validate([
            'nome' => 'required|min:3|max:40',//qtd min e max de caracteres
            'telefone'=>'required',
            'email' => 'required',
            'motivo_contato'=>'required',
            'mensagem'=>'required|max:200'
        ]);
    }
}
