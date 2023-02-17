<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Produto;
use Illuminate\Http\Request;
use App\Unidade;
use App\ProdutoDetalhe;

use App\Item;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe'])->paginate(10);

        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Tava dando b.o pq tinha escrito unidade errado no value do select dentro da view(HAHAHAHAHAHAHAHAHAHAHHAHA CORINGUEI)
        
        $regras = [
            'nome'=>'required|min:3',
            'descricao'=>'required',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id'
        ];

        $feedback = [
            'required'=>'O campo precisa ser preenchido',
            'nome.min'=>'O campo nome deve ter minimamente 3 caracteres',
            'peso.integer'=>'O campo peso deve ser um numero inteiro',
            'unidade_id.exists'=>'A unidade de medida não existe',
        ];

        $request->validate($regras, $feedback);

        $item = $request->all();

        $produto = new Produto();
        $produto->nome = $item['nome'];
        $produto->descricao = $item['descricao'];
        $produto->peso = $item['peso'];
        $produto->unidade_id = $item['unidade_id'];
        
        $produto->save();
        
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        

        return view('app.produto.show', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores'=> $fornecedores ]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        
        $produto->forceDelete();
        return redirect()->route('produto.index', ['produto'=>$produto->id]);

    }
}
