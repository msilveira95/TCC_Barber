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
            @foreach($contas as $infoconta)
            <div class="row margin-bottom-5px border-1px">
                <div class="col-md-4">
                    <p class="margin-top-15px">Descrição: {{$infoconta->idTipoConta}}</p>
                </div>
                <div class="col-md-4">
                    <p class="margin-top-15px">Valor: {{$infoconta->valor}}</p>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-sm btn-block btn-primary margin-top-10px" href="/conta/excluir-conta/{{$infoconta->id}}">Excluir</a>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-sm btn-block btn-primary margin-top-10px margin-bottom-5px" href="/conta/editar-conta/{{$infoconta->id}}">Editar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection