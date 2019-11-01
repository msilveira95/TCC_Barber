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
            <form action="{{ route('cadastrar-produto') }}" method="POST">
                @csrf
                @if(isset($tipoProduto))
                <div class="form-group">
                    <label>Grupo</label>
                    <select name="pTipoProduto" class="form-control">
                    @foreach($tipoProduto as $tipo)
                    
                    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                    
                    @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label for="desc">Descrição</label>
                    <input type="text" name="pDesc" placeholder="Descrição" class="form-control {{ $errors->has('pDesc') ? 'is-invalid' : '' }}">
                    @if($errors->has('pDesc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pDesc') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="valor">R$ valor</label>
                    <input type="text" name="pValor" placeholder="R$" class="form-control {{ $errors->has('pValor') ? 'is-invalid' : '' }}">
                    @if($errors->has('pValor'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pValor') }}
                        </div>
                    @endif
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
@endsection