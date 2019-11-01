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
        <div class="col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12 offset-0 margin-top-30px border border-info" id="dadosVenda">
            <h3>Venda realizada com sucesso!</h3>
            <div class="form-group">
                <input value="R$ {{ $valorVenda }}" class="form-control" disabled>
            </div>
            <a href="{{ route('cadastrar-venda') }}" class="btn btn-block btn-primary margin-bottom-10px" >Voltar ao PDV</a>
        </div>
    </div>
</div>
@endsection