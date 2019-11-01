<?php

Route::get('/', function () {
    return view('index');
})->name('index');

Route::prefix('/site')->group(function(){
    Route::get('/servico', function () {
        return view('site.servico');
    })->name('site.servicos');
    
    Route::get('/contato', function () {
        return view('site.contato');
    })->name('site.contato');
    
    Route::get('/login', function () {
        return view('site.login');
    })->name('site.login');
    
    Route::get('/logoff', function () {
        return view('site.logoff');
    })->name('site.logoff');
    
    Route::post('/login', 'UsuarioController@login')->name('efetua-login');
    
});

Route::get('/administracao', function () {
    return view('site.administrativo');
})->name('administrativo');

Route::prefix('/usuario')->group(function(){
    Route::get('/cadastro-de-usuario', 'UsuarioController@create')->name('cadastrar-usuario');
    Route::post('/cadastro-de-usuario', 'UsuarioController@store')->name('insere-usuario');
    Route::get('/pesquisa-usuarios', 'UsuarioController@index')->name('listar-usuarios');
    Route::get('/excluir-usuario/{id}', 'UsuarioController@destroy')->name('excluir-usuario');
    Route::get('/editar-usuario/{id}', 'UsuarioController@edit')->name('editar-usuario');
    Route::post('/editar-usuario/{id}', 'UsuarioController@update')->name('atualiza-usuario');
});

Route::prefix('/produto/')->group(function(){
    Route::get('/cadastro-de-produto', 'ProdutoController@create')->name('cadastrar-produto');
    Route::post('/cadastro-de-produto', 'ProdutoController@store')->name('insere-produto');
    Route::get('/pesquisa-produtos', 'ProdutoController@index')->name('listar-produtos');
    Route::get('/excluir-produto/{id}', 'ProdutoController@destroy')->name('excluir-produto');
    Route::get('/editar-produto/{id}', 'ProdutoController@edit')->name('editar-produto');
    Route::post('/editar-produto/{id}', 'ProdutoController@update')->name('atualiza-produto');
});

Route::prefix('/conta')->group(function(){
    Route::get('/cadastro-de-conta', 'ContaController@create')->name('cadastrar-conta');
    Route::post('/cadastro-de-conta', 'ContaController@store')->name('insere-conta');
    Route::get('/pesquisa-contas', 'ContaController@index')->name('listar-contas');
    Route::get('/excluir-conta/{id}', 'ContaController@destroy')->name('excluir-produto');
    Route::get('/editar-conta/{id}', 'ContaController@edit')->name('editar-conta');
    Route::post('/editar-conta/{id}', 'ContaController@update')->name('atualiza-conta');
});

Route::prefix('/PDV')->group(function(){
    Route::get('/vender', 'VendaController@create')->name('cadastrar-venda');
    Route::post('/vender', 'VendaController@store')->name('insere-venda');
});