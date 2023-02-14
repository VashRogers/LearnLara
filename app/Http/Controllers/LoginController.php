<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request) {

        $erro = ''; 

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha não existe';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a pagina';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        //regras de validacao

        $regras = [
            'usuario'=>'email',
            'senha'=>'required'
        ];

        //msgs de feedback
        $feedback = [
            'usuario.email'=>'O campo usuário(email) é obrigatório',
            'senha.required'=>'O campo senha é obrigatório'
        ];
        $request->validate($regras, $feedback);

        //recuperando parametros do form
        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();

        $usuario_exists = $user->where('email', $email)->where('password', $password)->get()->first();
        
        if(isset($usuario_exists->name)){
            session_start();
            $_SESSION['nome'] = $usuario_exists->name;
            $_SESSION['email'] = $usuario_exists->email;
            
            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }

        
        // print_r($usuario_exists);
    }
}
