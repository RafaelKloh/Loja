<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerCompra.php';
$obj_compra = new Compra();

$idProduto = $_POST['id'];
$result = $obj_compra->select_produto($idProduto);
$produto = mysqli_fetch_assoc($result);

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
    <form action="./Controller/ControllerProduto.php" method="post">
        <label>Descricao</label>
        <br>
        <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>">
        <br>
        <label>Preco</label>
        <br>
        <input type="number" name="preco" value="<?php echo $produto['preco']; ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $produto['idProduto']; ?>">
        <input type="hidden" name="acao" value="editarProduto">
        <br>
        <input type="submit" value="Salvar">

    </form>
</body>

</html>