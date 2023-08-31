<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/ControllerStatus.php';
$obj_status = new Status();

$idStatus = $_POST['id'];
$result = $obj_status->select_status($idStatus);
$status = mysqli_fetch_assoc($result);

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
    <form action="./Controller/ControllerStatus.php" method="post">
        <label>Descricao</label>
        <br>
        <input type="text" name="descricao" value="<?php echo $status['descricao']; ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $status['idStatus']; ?>">
        <input type="hidden" name="acao" value="editarStatus">
        <br>
        <input type="submit" value="Salvar">

    </form>
</body>

</html>