<?php
require_once "init.php";

$nome = isset($_POST["nome"]) ? $_POST["nome"] : null; 
$quantidade = isset($_POST["quantidade"]) ? $_POST["quantidade"] : null;
$preco = isset($_POST["preco"]) ? $_POST["preco"] : null;
$dataC = date("Y/m/d");
$imagem = isset($_FILES["img"]) ? imageFile($_FILES["img"], null) : null;

$PDO = DB_Connect();

$sql = "INSERT INTO produtos (nome, quantidade, preco, dataCadastro, imagem) VALUES (?, ?, ?, ?, ?)";

$stmt = $PDO->prepare($sql);

$stmt->bindValue(1, $nome);
$stmt->bindValue(2, $quantidade);
$stmt->bindValue(3, $preco);
$stmt->bindValue(4, $dataC);
$stmt->bindValue(5, $imagem);

$resultado = $stmt->execute();

if($resultado == true){
    header("location: index.php?true");
}else{
    print_r($stmt->errorInfo());
}