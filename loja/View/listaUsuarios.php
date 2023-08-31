<?php

include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerUsuario.php';
$obj_usuario = new Usuario();
$result = $obj_usuario->select();
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
<?php

include 'menuADM.html';
?>


<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Senha</th>
            <th>Email</th>
        </tr>

        <?php while ($usuario = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $usuario['nomeUsuario'] . '<br>'; ?></td>
                <td><?php echo $usuario['senhaUsuario'] . '<br>'; ?></td>
                <td><?php echo $usuario['emailUsuario'] . '<br>'; ?></td>
                <td>
                    <form action="./editarUsuario.php" method="post">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="id" value="<?php echo $usuario['idUsuario']; ?>">
                        <input type="submit" value="Editar">
                    </form>
                    <form action="./controller/controllerUsuario.php" method="post">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="id" value="<?php echo $usuario['idUsuario']; ?>">
                        <input type="submit" value="Excluir">
                    </form>
                <?php
            }
                ?>
            </tr>
    </table>
    </form>
</body>

</html>