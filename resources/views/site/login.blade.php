@extends('layouts.estrutura')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12 offset-0 margin-top-30px">
            <form action="{{ route('efetua-login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idLogin">Login</label>
                    <input type="text" id="idLogin" name="pLogin" placeholder="Login" class="form-control">
                </div>
                <div class="form-group">
                    <label for="idSenha">Senha</label>
                    <input type="password" id="idSenha" name="pSenha" placeholder="Senha" class="form-control">
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Fazer login">
            </form>
        </div>
    </div>
</div>
@endsection