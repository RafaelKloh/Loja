<?php

include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerMovimentacao.php';
$obj_mov = new Movimentacao();
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
        </tr>

        <?php while ($movimentacao = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $movimentacao['descricao'] . '<br>'; ?></td>
                <td>
                    <form action="editarMovimentacao.php" method="post">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="id" value="<?php echo $movimentacao['idTipoMovimentacao']; ?>">
                        <input type="submit" value="Editar">
                    </form>
        </td>
        <td>
                    <form action="./Controller/controllerMovimentacao.php" method="post">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="id" value="<?php echo $movimentacao['idTipoMovimentacao']; ?>">
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