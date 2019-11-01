@extends('layouts.estrutura')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12 offset-0 margin-top-30px">
            <form>
                <div class="form-group">
                    <label for="idNome">Nome</label>
                    <input type="text" id="idNome" name="pNome" placeholder="Nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="idEmail">E-mail</label>
                    <input type="email" id="idEmail" name="pEmail" placeholder="Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="idAssunto">Assunto</label>
                    <input type="text" id="idAssunto" name="pAssunto" placeholder="Assunto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="idMsg">Mensagem</label>
                    <textarea id="idMsg" name="pMsg" placeholder="Digite aqui sua mensagem" class="form-control" required></textarea>
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Enviar mensagem">
            </form>
        </div>
    </div>
</div>
@endsection
