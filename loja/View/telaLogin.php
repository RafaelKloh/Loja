

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela login</title>
</head>
<body>
    <form action="./controller/controllerUsuario.php" method="POST">
    <label>Usuario</label>
    <br>
    <input type="text" name = "Usuario">
    <br>
    <label>Senha</label>
    <br>
    <input type="password" name = "Senha">
    <br>
    <br>
    <input type="hidden" name = "acao" value="VerificarUsuario">
    <input type="submit" value="Entrar">
    </form>
    <br>
    <br>
    <a href="cadastroUsuario.php">Cadastrar</a>


</body>
</html>