<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerMovimentacao.php';
$obj_mov = new Movimentacao();

$idMov = $_POST['id'];
$result = $obj_mov->select_mov($idMov);
$movimentacao = mysqli_fetch_assoc($result);

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
    <form action="./Controller/ControllerMovimentacao.php" method="post">
        <label>Descricao</label>
        <br>
        <input type="text" name="descricao" value="<?php echo $movimentacao['descricao']; ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $movimentacao['idTipoMovimentacao']; ?>">
        <input type="hidden" name="acao" value="editarMov">
        <br>
        <input type="submit" value="Salvar">

    </form>
</body>

</html>