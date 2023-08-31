<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerUsuario.php';
$obj_usuario = new Usuario();

$idUsuario = $_POST['id'];
$result = $obj_usuario->select_usuario($idUsuario);
$resultado = $obj_usuario->select_funcao();
$usuario = mysqli_fetch_assoc($result);

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
    <form action="./Controller/ControllerUsuario.php" method="post">
        <label>Usuario</label>
        <br>
        <input type="text" name="usuario" value="<?php echo $usuario['nomeUsuario']; ?>">
        <br>
        <label>Email</label>
        <br>
        <input type="text" name="email" value="<?php echo $usuario['emailUsuario']; ?>">
        <br>
        <label>Senha</label>
        <br>
        <input type="text" name="senha" value="<?php echo $usuario['senhaUsuario']; ?>">
        <br>
        <label>Função</label>
        <br>
        <select name="funcao">
            <option value="0">Selecione</option>
        <?php
        while($funcao = mysqli_fetch_assoc($resultado))
        { ?>
            <option value="<?php echo $funcao['idFuncao'] ?>">
            
            <?php echo $funcao['descricao'] ?></option>
            
            <?php
        }
        ?>
        </select>
        <input type="hidden" name="id" value="<?php echo $usuario['idUsuario']; ?>">
        <input type="hidden" name="acao" value="editarusuario">
        <br>
        <input type="submit" value="Salvar">

    </form>
</body>

</html>