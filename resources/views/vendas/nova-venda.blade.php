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
        <div class="col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12 offset-0 margin-top-30px">
            <form action="{{ route('insere-venda') }}" method="POST">
                @csrf
                <input type="hidden" value="<?php echo $_SESSION['user']['id'];?>" name="pIdVendedor">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" id="idCPF" name="pCPF" placeholder="CPF cliente" class="form-control {{ $errors->has('pCPF') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-info" id="buscaCliente"><i class="fas fa-search"></i></button>
                    </div>
                    <div id="dadoCliente" class="col-12">
                        
                    </div>
                    <div class="col-md-12">
                        @if(isset($tipoVenda))
                        <div class="form-group">
                            <label>Pagamento</label>
                            <select name="pTipoPagamento" class="form-control">
                            @foreach($tipoVenda as $opcoesVenda)

                                <option value="{{ $opcoesVenda->id }}">{{ $opcoesVenda->descricao }}</option>

                            @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                @if(isset($produtos))
                <label>Produto/Serviço</label>
                @endif
                <div class="row">
                    
                    <div class="col-md-8">
                        @if(isset($produtos))
                        <div class="form-group">
                            <select class="form-control" id="produtos">
                            @foreach($produtos as $prod)

                                <option value="{{ $prod->id }}">{{ $prod->descricao }}</option>

                            @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-success" id="insereProduto">Inserir produto</button>
                    </div>
                </div>
                        
                <div id="produtosComprados" class="col-12">
                    
                </div>
                <div id="contaItens"></div>
                <input type="submit" class="btn btn-block btn-primary margin-top-10px" value="Registrar venda">
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    var contaProdutos = 0;
    $("#buscaCliente").click(function(e){
        e.preventDefault();
        var cpf = $("#idCPF").val();
        $.getJSON('/api/cliente/'+cpf, function(data){
            console.log(data);
            if(data == "")
                alert("Não existe usuário cadastrado com o CPF informado.");
            else{
                var montaHTML = "<div class='row text-primary border border-warning margin-bottom-10px rounded'><div class='col-6'>Cliente: " + data[0].nome + "</div><div class='col-6'>CPF: " + data[0].cpf + "</div>";
                montaHTML += "<input type='hidden' value='"+data[0].id+"' name='pIdCliente'><br><br>";
                $("#dadoCliente").html(montaHTML);
            }
        });
    });
    $("#insereProduto").click(function(e){
        e.preventDefault();
        var html = "<div class='row text-primary border border-info margin-bottom-10px rounded'><p>"+$("#produtos option:selected").text()+"</p></div>";
        html += "<div class='form-group'><input type='hidden' class='form-control' name='"+contaProdutos+"' value='"+$("#produtos option:selected").val()+"'></div>";
        $("#produtosComprados").append(html);
        contaProdutos++;
        $("#contaItens").html("<input type='hidden' value='"+contaProdutos+"' name='pQtdProdutos'>");
    });
</script>
@endsection