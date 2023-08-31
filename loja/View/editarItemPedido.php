<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerProduto.php';
$obj_produto = new Produto();

$idProduto = $_POST['idProduto'];
$result = $obj_produto->select($idProduto);
$produto = mysqli_fetch_assoc($result);
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
    if ($_SESSION['idFuncao'] != 2)
    {
        header('Location: telaLogin.php');
        exit();
    }
}
?>
<body>
    <form action="./controller/controllerPedido.php" method="post">
    <label>Quantidade</label>
    <br>
    <input type="number" name="quantidade">
    <br>
    <br>
    <input type="hidden" name="idProduto" value=<?php echo $produto['idProduto']?>>
    <input type="hidden" name="acao" value = "editarQuantidade">
    <input type="submit" name = "editar" value = "Editar">
    </form>
</body>
</html>