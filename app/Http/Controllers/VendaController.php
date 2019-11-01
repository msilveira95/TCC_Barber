<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\TipoVenda;
use App\Venda;
use App\fk_produtos_vendas;

class VendaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $produtos = Produto::all();
        $tipoVenda = TipoVenda::all();
        return view('vendas/nova-venda', compact('produtos', 'tipoVenda'));
    }

    public function store(Request $request)
    {
        $venda = new Venda();
        $venda->idTipoVenda = $request->input('pTipoPagamento');
        if(!empty($request->input('pIdCliente')))
            $venda->idComprador = $request->input('pIdCliente');
        else
            $venda->idComprador = null;
        $venda->idUsuario = $request->input('pIdVendedor');
        $venda->save();   
        $percorreProdutos = 0;
        $qtdProd = $request->input('pQtdProdutos');
        while($percorreProdutos < $qtdProd){
            $inserProds = new fk_produtos_vendas();
            $inserProds->idProduto = $request->input($percorreProdutos);
            $inserProds->idVenda = $venda->id;
            $inserProds->save();
            $percorreProdutos++;
        }
        $dadosVenda = fk_produtos_vendas::where('idVenda', '=', $venda->id)->get();
        $prod = new Produto();
        $valorVenda = 0;
        foreach($dadosVenda as $d){
            $prod = Produto::find($d->idProduto);
            $valorVenda = $valorVenda + $prod->valor;
        }
        return view('vendas.dados-venda', compact('valorVenda'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
