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
    <form action="./controller/controllerFuncao.php" method="post">
        <label>Descrição</label>
        <br>
        <input type="text" name = "descricao">
        <br>
        <br>
        <input type="submit" value = "cadastrar">
        <input type="hidden" name = "acao" value = "cadastrar">
    </form>
</body>
</html>