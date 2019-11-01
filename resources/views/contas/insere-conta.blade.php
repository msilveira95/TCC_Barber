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
            <form action="{{ route('cadastrar-conta') }}" method="POST">
                @csrf
                @if(isset($tipoConta))
                <div class="form-group">
                    <label>Grupo</label>
                    <select name="pTipoConta" class="form-control">
                    @foreach($tipoConta as $conta)
                    
                    <option value="{{ $conta->id }}">{{ $conta->descricao }}</option>
                    
                    @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label for="valor">R$ valor</label>
                    <input type="text" name="pValor" placeholder="R$" class="form-control">
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
@endsection