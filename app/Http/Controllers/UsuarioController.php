<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\TipoUser;

class UsuarioController extends Controller
{
    public function index(){
        $user = Usuario::all(); //Busca todos usuarios
        return view('usuarios.lista-usuarios', compact('user'));
    }

    public function create()
    {
        $tipoUser = TipoUser::all();
        return view("usuarios.novo-usuario", compact('tipoUser'));
    }

    public function store(Request $request)
    {
        $regras = [
            'pNome' => 'required|min:3|max:30',
            'pSobrenome' => 'required|min:3|max:120',
            'pCPF' => 'unique:usuarios,cpf',
            'pEmail' => 'required|min:3|max:255|email|unique:usuarios,login',
            'pSenha' => 'required|min:6'
        ];
        $mensagensErro = [
            'pNome.required' => 'Campo Nome não pode ser vazio',
            'pNome.min' => 'Campo Nome deve conter pelo menos 3 caracteres',
            'pNome.max' => 'Campo Nome não pode conter mais que 30 caracteres',
            'pSobrenome.required' => 'Campo Sobrenome não pode ser vazio',
            'pSobrenome.min' => 'Campo Sobrenome deve conter pelo menos 3 caracteres',
            'pSobrenome.max' => 'Campo Nome não pode conter mais que 120 caracteres',
            'pCPF.unique' => 'CPF já cadastrado no banco de dados',
            'pEmail.required' => 'Campo E-mail não pode ser vazio',
            'pEmail.min' => 'Campo E-mail deve conter pelo menos 3 caracteres',
            'pEmail.max' => 'Campo E-mail não pode conter mais que 255 caracteres',
            'pEmail.email' => 'Por favor, preencha o campo E-mail com um endereço de e-mail válido',
            'pEmail.unique' => 'E-mail já cadastraso no banco de dados',
            'pSenha.required' => 'Campo Senha não pode ser vazio',
            'pSenha.min' => 'Campo Senha deve conter pelo menos 6 caracteres'
        ];
        $request->validate($regras, $mensagensErro);
        $user = new Usuario();
        $user->idTipoUser = $request->input('pTipoUser');
        $user->nome = $request->input('pNome');
        $user->sobrenome = $request->input('pSobrenome');
        $user->cpf = $request->input('pCPF');
        $user->login = $request->input('pEmail');
        $user->qtdCompras = 0;
        $user->senha = $request->input('pSenha');
        $user->save();
        return redirect('/usuario/pesquisa-usuarios');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $user = Usuario::where('id', '=', $id)->get();
        $tipoUser = TipoUser::all();
        if(count($user) == 1){
            return view('usuarios/editar-usuario', compact('user', 'tipoUser'));
        }
        return redirect('/usuario/pesquisa-usuarios');
    }
    
    public function update(Request $request, $id)
    {
        $user = Usuario::find($id);
        if(isset($user)){
            $regras = [
                'pNome' => 'required|min:3|max:30',
                'pSobrenome' => 'required|min:3|max:120',
                'pEmail' => 'required|min:3|max:255|email',
                'pSenha' => 'required|min:6'
            ];
            $mensagensErro = [
                'pNome.required' => 'Campo Nome não pode ser vazio',
                'pNome.min' => 'Campo Nome deve conter pelo menos 3 caracteres',
                'pNome.max' => 'Campo Nome não pode conter mais que 30 caracteres',
                'pSobrenome.required' => 'Campo Sobrenome não pode ser vazio',
                'pSobrenome.min' => 'Campo Sobrenome deve conter pelo menos 3 caracteres',
                'pSobrenome.max' => 'Campo Nome não pode conter mais que 120 caracteres',
                'pCPF.unique' => 'CPF já cadastrado no banco de dados',
                'pEmail.required' => 'Campo E-mail não pode ser vazio',
                'pEmail.min' => 'Campo E-mail deve conter pelo menos 3 caracteres',
                'pEmail.max' => 'Campo E-mail não pode conter mais que 255 caracteres',
                'pEmail.email' => 'Por favor, preencha o campo E-mail com um endereço de e-mail válido',
                'pEmail.unique' => 'E-mail já cadastraso no banco de dados',
                'pSenha.required' => 'Campo Senha não pode ser vazio',
                'pSenha.min' => 'Campo Senha deve conter pelo menos 6 caracteres'
            ];
            $request->validate($regras, $mensagensErro);
            $user->idTipoUser = $request->input('pTipoUser');
            $user->nome = $request->input('pNome');
            $user->sobrenome = $request->input('pSobrenome');
            $user->cpf = $request->input('pCPF');
            $user->login = $request->input('pEmail');
            $user->senha = $request->input('pSenha');
            $user->save();
        }
        return redirect('/usuario/pesquisa-usuarios');
    }

    public function destroy($id)
    {
        $user = Usuario::find($id);
        if(isset($user)){
            $user->delete();
        }
        return redirect('/usuario/pesquisa-usuarios');
    }
    
    public function login(Request $request){
        $user = Usuario::where('login', '=', $request->input('pLogin'))->where('senha', '=', $request->input('pSenha'))->get();
        if(count($user) == 0){
            return redirect('/site/login');
        } else{
            return view('site.administrativo', compact('user'));
        }
    }
    
    public function buscaUserJSON($cpf){
        $user = Usuario::where('cpf', '=', $cpf)->get();;
        return json_encode($user);
    }
}