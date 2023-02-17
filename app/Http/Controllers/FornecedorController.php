<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(2);

        
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request ) {
        
        $stats_msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
            //cadastro do registro
            $regras = [ 
                'nome'=>'required|min:3|max:40',
                'site'=>'required',
                'uf'=>'required|min:2|max:2',
                'email'=>'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no maximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            
            $fornecedor->create($request->all());

            $stats_msg = 'Cadastro feito com sucesso';
        }

        //edição de registro
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());

            if($update){
                $stats_msg = "Update feito com success";
            } else {
                $stats_msg = "Erro no update";
            }

            return redirect()->route('app.fornecedor.adicionar', ['id'=> $request->input('id'), 'msg' => $stats_msg]);
        }

        
        return view('app.fornecedor.adicionar', ['msg' => $stats_msg]);
    }

    public function editar($id, $msg = '') {
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor'=>$fornecedor, 'msg'=>$msg]);
    }

    public function excluir($id) {
        // Fornecedor::find($id)->delete();
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor.adicionar');
    }
}
