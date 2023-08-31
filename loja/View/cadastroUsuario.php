<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="./controller/controllerUsuario.php" method="post">
    <label>Usuario</label>
    <br>
    <input type="text" name = "usuario">
    <br>
    <label>Email</label>
    <br>
    <input type="text" name = "email">
    <br>
    <label>Senha</label>
    <br>
    <input type="text" name = "senha">
    <br>
    <label>Confirmar senha</label>
    <br>
    <input type="text" name = "confirmasenha">
    <br>
    <input type="hidden" name = "acao" value = "cadastrar">
    <input type="submit" value = "Cadastrar">
    </form>


    

</body>
</html>