<?php include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerUsuario.php';
$obj_usuario = new Usuario();

$resultado = $obj_usuario->select_funcao();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<?php
include 'menuADM.html';
?>
<?php 
session_start();

if(isset($_SESSION['idUsuario']) == false)
{
    header("Location: telaLogin.php");
    exit();
}
if(isset($_SESSION['idFuncao']) == true)
{
    if ($_SESSION['idFuncao'] != 1)
    {
        header('Location: telaLogin.php');
        exit();
    }
}
?>
<body>
    <form action="./controller/controllerUsuario.php" method="post">
        <label>Usuario</label>
        <br>
        <input type="text" name="usuario">
        <br>
        <label>Email</label>
        <br>
        <input type="text" name="email">
        <br>
        <label>Senha</label>
        <br>
        <input type="text" name="senha">
        <br>
        <label>Confirmar senha</label>
        <br>
        <input type="text" name="confirmasenha">
        <br>
        <label>Função</label>
        <br>

        <select name="funcao">
            <option value="0">Selecione</option>
            <?php
            while ($usuario = mysqli_fetch_assoc($resultado)) { ?>
                <option value="<?php echo $usuario['idFuncao'] ?>">

                    <?php echo $usuario['descricao'] ?></option>

            <?php
            }
            ?>
        </select>
        <br>
        <br>
        <input type="hidden" name="acao" value="cadastrarADM">
        <input type="submit" value="Cadastrar">
    </form>




</body>

</html>