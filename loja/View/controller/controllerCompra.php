<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerProduto.php';
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerPedido.php';
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerItemPedido.php';

$acao = $_POST['acao'];

$obj_produto = new Produto();
$obj_pedido = new Pedido();
$obj_item_pedido = new ItemPedido();

if ($acao == 'adicionarAoCarrinho') {
    $idProduto = $_POST['idProduto'];
    

    session_start();
    $pedido = $obj_pedido->select($_SESSION['idUsuario']);

    if ($pedido != false) {
        $idPedido = $pedido['idPedido'];
        $_SESSION['idPedido'] = $idPedido;
    }
    else {
        $pedido = $obj_pedido->insert($_SESSION['idUsuario']);

        if ($pedido == true) {
            $pedido = $obj_pedido->select($_SESSION['idUsuario']);
            $idPedido = $pedido['idPedido'];
            $_SESSION['idPedido'] = $idPedido;
        }
    }

    $inserirItem = $obj_item_pedido->insert($idPedido, $idProduto);

    if ($inserirItem == true) {
        header('Location: ../listaProdutos.php');
        exit();
    }
    else {
        echo "Ocorreu um erro!";
    }
}