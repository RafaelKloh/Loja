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
    <form action="./controller/controllerProduto.php" method = "post">
        <label>Descrição</label>
        <br>
        <input type="text" name = "nome">
        <br>
        <label>Preço</label>
        <br>
        <input type="number" name = "preco">
        <br>
        <br>
        <input type="hidden" name = "acao" value = "cadastroProduto">
        <input type="submit" value = "Cadastrar">
    </form>
</body>
</html>