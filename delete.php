<?php
require_once "init.php";

$id = $_GET["id"];

$PDO = DB_Connect();

$sql = "DELETE from produtos WHERE id = ?"; 

$stmt = $PDO->prepare($sql);

$stmt->bindValue(1, $id);

$resultado = $stmt->execute();

header("location: index.php?$resultado");