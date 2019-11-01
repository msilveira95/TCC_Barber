<?php
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>window.location.href = '/site/login';</script>";
    }
?>
@extends('layouts.layout-administrativo')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12 offset-0 margin-top-30px">
            @foreach($user as $usuario)
            @endforeach
            <form action="/usuario/editar-usuario/{{$usuario->id}}" method="POST">
                @csrf
                @if(isset($tipoUser))
                <div class="form-group">
                    <label>Grupo</label>
                    <select name="pTipoUser" class="form-control">
                    @foreach($tipoUser as $tipo)
                    
                    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                    
                    @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label for="idNome">Nome</label>
                    <input type="text" id="idNome" name="pNome" placeholder="Nome" value="{{$usuario->nome}}" class="form-control {{ $errors->has('pNome') ? 'is-invalid' : '' }}">
                    @if($errors->has('pNome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pNome') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="idSobrenome">Sobrenome</label>
                    <input type="text" id="idSobrenome" name="pSobrenome" placeholder="Sobrenome" value="{{$usuario->sobrenome}}" class="form-control {{ $errors->has('pSobrenome') ? 'is-invalid' : '' }}">
                    @if($errors->has('pSobrenome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pSobrenome') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="idCPF">CPF</label>
                    <input type="text" id="idCPF" name="pCPF" placeholder="CPF" value="{{$usuario->cpf}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="idEmail">E-mail</label>
                    <input type="text" id="idEmail" name="pEmail" placeholder="E-mail" value="{{$usuario->login}}" class="form-control {{ $errors->has('pEmail') ? 'is-invalid' : '' }}">
                    @if($errors->has('pEmail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pEmail') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="idSenha">Senha</label>
                    <input type="password" id="idSenha" name="pSenha" placeholder="Senha" value="{{$usuario->senha}}" class="form-control {{ $errors->has('pSenha') ? 'is-invalid' : '' }}">
                    @if($errors->has('pSenha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pSenha') }}
                    </div>
                    @endif
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Salvar edição">
            </form>
        </div>
    </div>
</div>
@endsection