<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerProduto.php';
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerPedido.php';
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerItemPedido.php';

$acao = $_POST['acao'];

$obj_produto = new Produto();
$obj_pedido = new Pedido();
$obj_item_pedido = new ItemPedido();

if ($acao == 'finalizarCompra') {
    $idPedido = $_POST['idPedido'];

    $result = $obj_item_pedido->select();

    while ($itemPedido = mysqli_fetch_assoc($result)) {
        $obj_produto->updateEstoque($itemPedido['idProduto'], $itemPedido['quantidade']);
    }

    $retorno = $obj_pedido->updateStatus($idPedido);

    if ($retorno == true) {
        echo "A compra foi realizada";
    }
    else {
        echo "Ocorreu um erro";
    }
}

else if ($acao == "editarQuantidade")
{
    $quantidade = $_POST['quantidade'];
    $idProduto = $_POST['idProduto'];

    $result = $obj_pedido->update_quantidade($idProduto,$quantidade);

    if ($result == true)
    {
        header('Location: ../carrinho.php');
        exit();
    }
    else{
        "Algo deu errado";
    }

}

else if ($acao == "excluirItemPedido")
{
    $idProduto = $_POST['idProduto'];

    $result = $obj_pedido->delete_quantidade($idProduto);

    if ($result == true)
    {
        header('Location: ../carrinho.php');
        exit();
    }
    else{
        "Algo deu errado";
    }

}