<?php
require_once "init.php";

$id = isset($_GET["id"]) ? $_GET["id"] : null;

$PDO = DB_Connect();

$sql = "SELECT * from produtos where id = ?";

$stmt = $PDO->prepare($sql);

$stmt->bindValue(1, $id);

$stmt->execute();

$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editando dados de um produto</title>
</head>
<body>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="nome" id="" value="<?= $r["nome"] ?>"><br>
        <input type="number" name="quantidade" id="" value="<?= $r["quantidade"] ?>"><br>
        <input type="number" name="preco" id="" value="<?= $r["preco"] ?>"><br>
        <input type="date" name="dataCadastro" id="" value="<?= $r["dataCadastro"] ?>"><br>
        <input type="hidden" name="imgOld" value="<?php $r["img"] ?>">
        <input type="file" name="img" id=""><br>
        <input type="submit" value="Editar" class="btn">
    </form>
</body>
</html>