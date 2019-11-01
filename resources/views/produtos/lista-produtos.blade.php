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
        <div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 margin-top-30px">
            @foreach($produtos as $infoprod)
            <div class="row margin-bottom-5px border-1px">
                <div class="col-md-3">
                    <p class="margin-top-15px">{{$infoprod->descricao}}</p>
                </div>
                <div class="col-md-3">
                    <p class="margin-top-15px">{{$infoprod->idTipoProduto}}</p>
                </div>
                <div class="col-md-2">
                    <p class="margin-top-15px">R$ {{$infoprod->valor}}</p>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-sm btn-block btn-primary margin-top-10px" href="/produto/excluir-produto/{{$infoprod->id}}">Excluir</a>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-sm btn-block btn-primary margin-top-10px margin-bottom-5px" href="/produto/editar-produto/{{$infoprod->id}}">Editar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection