<?php
    session_start();
    if(!empty($user)){
        foreach($user as $usuario){
            $dados = [
                "id" => $usuario->id,
                "nome" => $usuario->nome,
                "sobrenome" => $usuario->sobrenome,
                "login" => $usuario->login
            ];
        }
        $_SESSION['user'] = $dados;
    } else if(!isset($_SESSION['user'])){
        echo "<script>window.location.href = '/site/login';</script>";
    }
?>
@extends('layouts.layout-administrativo')
@section('conteudo')
@endsection