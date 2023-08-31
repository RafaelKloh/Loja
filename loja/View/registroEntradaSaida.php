<?php include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerProduto.php';
      include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerMovimentacao.php';
$obj_produto = new produto();
$obj_mov = new Movimentacao();

$resultado = $obj_produto->select();
$result = $obj_mov->select();

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
    if ($_SESSION['idFuncao'] != 2)
    {
        header('Location: telaLogin.php');
        exit();
    }
}
?>
<body>
    <form action="./controller/controllerMovimentacao.php" method="post">
        <label>Produto</label>
        <br>
        

        <select name="produto">
            <option value="0">Selecione</option>
            <?php
            while ($produto = mysqli_fetch_assoc($resultado)) { ?>
                <option value="<?php echo $produto['idProduto'] ?>">

                    <?php echo $produto['descricao'] ?></option>

            <?php
            }
            ?>
        </select>
        <br>
        <br>
        <label>Quantidade</label>
        <br>
        <input type="number" name = "quantidade">
        <br>
        <label>Tipo Movimentacao</label>
        <br>
        <select name="tipoMov">
            <option value="0">Selecione</option>
            <?php
            while ($movimentacao = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $movimentacao['idTipoMovimentacao'] ?>">

                    <?php echo $movimentacao['descricao'] ?></option>

            <?php
            }
            ?>
        </select>
        <br>
        <br>
        <input type="hidden" name="acao" value="registroMov">
        <input type="submit" value="Cadastrar">
    </form>




</body>

</html>