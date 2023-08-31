<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerFuncao.php';
$obj_funcao = new Funcao();

$idFuncao = $_POST['id'];
$result = $obj_funcao->select_funcao($idFuncao);
$funcao = mysqli_fetch_assoc($result);

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
    <form action="./Controller/ControllerFuncao.php" method="post">
        <label>Descricao</label>
        <br>
        <input type="text" name="descricao" value="<?php echo $funcao['descricao']; ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $funcao['idFuncao']; ?>">
        <input type="hidden" name="acao" value="editarFuncao">
        <br>
        <input type="submit" value="Salvar">

    </form>
</body>

</html>