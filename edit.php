<?php
require_once "init.php";

$imgOld = $_POST["imgOld"];

$id = $_POST["id"];

$nome = isset($_POST["nome"]) ? $_POST["nome"] : null; 
$quantidade = isset($_POST["quantidade"]) ? $_POST["quantidade"] : null;
$preco = isset($_POST["preco"]) ? $_POST["preco"] : null;
$dataC = isset($_POST["dataCadastro"]) ? $_POST["dataCadastro"] : null;
$imagem = isset($_FILES["img"]) ? imageFile($_FILES["img"], $imgOld) : null;

$PDO = DB_Connect();

$sql = "UPDATE produtos SET nome = ?, quantidade = ?, preco = ?, dataCadastro = ?, imagem = ? WHERE id = ?";

$stmt = $PDO->prepare($sql);

$stmt->bindValue(1, $nome);
$stmt->bindValue(2, $quantidade);
$stmt->bindValue(3, $preco);
$stmt->bindValue(4, $dataC);
$stmt->bindValue(5, $imagem);
$stmt->bindValue(6, $id);

$resultado = $stmt->execute();

header("location: index.php?$resultado");