<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\TipoProduto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.lista-produtos', compact('produtos'));
        
    }

    public function create()
    {
        $tipoProduto = TipoProduto::all();
        return view("produtos.novo-produto", compact('tipoProduto'));
    }

    public function store(Request $request)
    {
        $regras = [
            'pDesc' => 'required|min:3|max:40',
            'pValor' => 'required'
        ];
        $mensagensErro = [
            'pDesc.required' => 'O campo Descrição não pode ser vazio',
            'pDesc.min' => 'O campo Descrição deve conter pelo menos 3 caracteres',
            'pDesc.max' => 'O campo Descrição deve conter pelo menos 40 caracteres',
            'pValor.required' => 'O campo Valor não pode ser vazio'
        ];
        
        $request->validate($regras, $mensagensErro);
        $produto = new Produto();
        $produto->idTipoProduto = $request->input('pTipoProduto');
        $produto->descricao = $request->input('pDesc');
        $produto->valor = $request->input('pValor');
        $produto->save();
        return redirect('/produto/pesquisa-produtos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Produto::where('id', '=', $id)->get();
        $tipoProduto = TipoProduto::all();
        if(count($produto) == 1){
            return view('/produtos/editar-produto', compact('produto', 'tipoProduto'));
        }
        return redirect('/produto/pesquisa-produtos');
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            $produto->idTipoProduto = $request->input('pTipoProduto');
            $produto->descricao = $request->input('pDesc');
            $produto->valor = $request->input('pValor');
            $produto->save();
        }
        return redirect('/produto/pesquisa-produtos');
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            $produto->delete();
        }
        return redirect('/produto/pesquisa-produtos');
    }
}
