<?php
require_once "init.php";

if(isset($_GET["display"])){

    $PDO = DB_Connect();

    if($_GET["display"] == "allProducts"){

        $display = "produtos";
        
        $sql = "SELECT * from produtos";

        $stmt = $PDO->prepare($sql);

        $stmt->execute();

        $a = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }elseif($_GET["display"] == "product"){

        $id = isset($_GET["id"]) ? $_GET["id"] : null;
          
        $sql = "SELECT * from produtos WHERE id = ?";

        $stmt = $PDO->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $a = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estoque de Produtos</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Sistema de estoque de produtos.</h1>
        
        <hr>
        
        <a href="formAdd.php">Adicionar um produto</a><br>

        <hr>

        <a href="index.php?display=allProducts">Exibir todos os produtos</a><br><br>

        <form action="index.php" method="get">
            <input type="hidden" name="display" value="product">
            <input type="number" name="id" id="idProduct" placeholder="Insira o número de identificação do produto específico">&nbsp;
            <input type="submit" value="Procurar" class="btn btn-success">
        </form>

        <hr>
        
        <?php

            if(isset($_GET["display"]) && $a > 0): ?>

                <div class="row">

                    <?php foreach($a as $r): ?>
                        <div class="col-md-3">
                            <figure style="width: 17rem;" class="text-center card card-product">
                                <div class="img-wrap"><img src="image/<?= $r["imagem"] ?>"></div>
                                <figcaption class="info-wrap">
                                        <h4 class="title"><?= $r["nome"] ?></h4>
                                        <p class="desc">ID: <?= $r["id"] ?></p>
                                        <p class="desc"><?= $r["quantidade"] ?> restantes.</p>
                                        <p class="desc">R$<?= $r["preco"] ?></p>
                                </figcaption>
                                <hr>
                                <p class="info"><a href="formEdit.php?id=<?=$r["id"] ?>">Editar produto</a></p>
                                <p class="danger"><a href="delete.php?id=<?=$r["id"] ?>"
                                onclick="return confirm('Você tem certeza de que deseja remover?');">Excluir produto</a></p>
                                <span class="text-right small"><?= dateConvert($r["dataCadastro"]) ?></span>
                            </figure>
                        </div>

                    <?php endforeach; ?>

                </div>
                
            <?php endif; ?>
        </div>
</body>
</html>