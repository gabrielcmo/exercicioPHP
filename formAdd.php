<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrando produto</title>
</head>
<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nome" id="" placeholder="Nome do produto"><br><br>
        <input type="number" name="quantidade" id="" placeholder="Quantidade"><br><br>
        <input type="number" name="preco" id="" placeholder="Preço"><br><br>
        <input type="file" name="img" id=""><br><br>
        <input type="submit" value="Cadastrar" class="btn">
    </form>
</body>
</html>