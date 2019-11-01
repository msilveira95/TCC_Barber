/**
 * Author:  Mateus
 * Created: 17/08/2019
 */

CREATE DATABASE bd_barbearia;
USE bd_barbearia;

CREATE TABLE tipoUsers(
	id INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(10),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME
);

INSERT INTO tipoUsers (descricao) VALUES ("Admin");
INSERT INTO tipoUsers (descricao) VALUES ("Cliente");

CREATE TABLE usuarios(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idTipoUser INT,
	nome VARCHAR(30),
	sobrenome VARCHAR(120),
        cpf VARCHAR(15) UNIQUE,
	qtdCompras INT,
	login VARCHAR(255),
	senha CHAR(32),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME,
	FOREIGN KEY (idTipoUser) REFERENCES tipoUsers(id)
);

CREATE TABLE tipoProdutos(
	id INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(15),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME
);

INSERT INTO tipoProdutos (descricao) VALUES("Produto");
INSERT INTO tipoProdutos (descricao) VALUES("Serviço");

CREATE TABLE produtos(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idTipoProduto INT,
        idUsuario INT,
	descricao VARCHAR(40),
	valor DECIMAL(10,2),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME,
	FOREIGN KEY (idTipoProduto) REFERENCES tipoProdutos (id),
	FOREIGN KEY (idUsuario) REFERENCES usuarios (id)
);

CREATE TABLE tipoVendas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(10),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME
);

INSERT INTO tipoVendas (descricao, created_at, updated_at) VALUES ('Dinheiro', NOW(), NOW());
INSERT INTO tipoVendas (descricao, created_at, updated_at) VALUES ('Cartão', NOW(), NOW());
INSERT INTO tipoVendas (descricao, created_at, updated_at) VALUES ('Boleto', NOW(), NOW());

CREATE TABLE vendas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idTipoVenda INT,
        idUsuario INT,
        idComprador INT,
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME,
	FOREIGN KEY (idTipoVenda) REFERENCES tipoVendas(id),
        FOREIGN KEY (idUsuario) REFERENCES usuarios (id),
        FOREIGN KEY (idComprador) REFERENCES usuarios (id)
);

CREATE TABLE fk_produtos_vendas(
        id INT AUTO_INCREMENT PRIMARY KEY,
        idProduto INT,
        idVenda INT,
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME,
        FOREIGN KEY (idProduto) REFERENCES produtos (id),
        FOREIGN KEY (idVenda) REFERENCES vendas (id)
);

CREATE TABLE tipoContas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(20),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME
);

INSERT INTO tipoContas (descricao, created_at, updated_at) VALUES ('Luz', NOW(), NOW());
INSERT INTO tipoContas (descricao, created_at, updated_at) VALUES ('Água', NOW(), NOW());

CREATE TABLE contas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idTipoConta INT,
        idUsuario INT,
	valor DECIMAL(10,2),
        deleted_at DATETIME,
        created_at DATETIME,
        updated_at DATETIME,
	FOREIGN KEY (idTipoConta) REFERENCES tipoContas (id),
        FOREIGN KEY (idUsuario) REFERENCES usuarios (id)
);