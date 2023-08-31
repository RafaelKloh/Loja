<?php

include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerProduto.php';
$obj_produto = new Produto();
$result = $obj_produto->select();
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

<?php
include 'menuADM.html';
?>
    <table>
        <tr>
            <th>Descricao</th>
            <th>Preço</th>
        </tr>

        <?php while ($produto = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $produto['descricao'] . '<br>'; ?></td>
                <td><?php echo $produto['preco'] . '<br>'; ?></td>
                <td>
                    <form action="editarProduto.php" method="post">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="id" value="<?php echo $produto['idProduto']; ?>">
                        <input type="submit" value="Editar">
                    </form>
        </td>
        <td>
                    <form action="./Controller/controllerProduto.php" method="post">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="id" value="<?php echo $produto['idProduto']; ?>">
                        <input type="submit" value="Excluir">
                    </form>
        </td>
                <?php
            }
                ?>
            </tr>
    </table>
    </form>
</body>

</html>