<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\TipoConta;

class ContaController extends Controller
{

    public function index()
    {
        $contas = Conta::all();
        return view('contas.lista-contas', compact('contas'));
    }

    public function create()
    {
        $tipoConta = TipoConta::all();
        return view('contas.insere-conta', compact('tipoConta'));
    }

    public function store(Request $request)
    {
        $conta = new Conta();
        $conta->valor = $request->input('pValor');
        $conta->idTipoConta = $request->input('pTipoConta');
        $conta->save();
        return redirect('/conta/pesquisa-contas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $conta = Conta::where('id', '=', $id)->get();
        $tipoConta = TipoConta::all();
        if(count($conta) == 1){
            return view('/contas/editar-conta', compact('conta', 'tipoConta'));
        }
        return redirect('/contas/pesquisa-contas');
    }

    public function update(Request $request, $id)
    {
        $conta = Conta::find($id);
        if(isset($conta)){
            $conta->valor = $request->input('pValor');
            $conta->idTipoConta = $request->input('pTipoConta');
            $conta->save();
        }
        return redirect('/conta/pesquisa-contas');
    }

    public function destroy($id)
    {
        $conta = Conta::find($id);
        if(isset($conta)){
            $conta->delete();
        }
        return redirect('/conta/pesquisa-contas');
    }
}
