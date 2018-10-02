create database estoque;
use estoque;

create table Produtos(
    id int auto_increment not null,
    nome varchar(60),
    quantidade int(10) not null,
    preco decimal(10,2) not null,
    dataCadastro date,
    imagem varchar(50),
    primary key(id)
);