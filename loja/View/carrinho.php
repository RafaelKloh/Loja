<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerItemPedido.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerProduto.php';

    $obj_produto = new Produto();
    $obj_item_pedido = new ItemPedido();

    session_start();
    $result = $obj_item_pedido->select($_SESSION['idPedido']);
    $valorTotal = 0;
    if(isset($_SESSION['idUsuario']) == false)
{
    header("Location: telaLogin.php");
    exit();
}
if(isset($_SESSION['idFuncao']) == true)
{
    if ($_SESSION['idFuncao'] != 1)
    {
        header('Location: telaLogin.php');
        exit();
    }
}
?>

<body>
    <?php
include 'menuUsuario.html';
?>
    <table>
        <tr>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th></th>
        </tr>
        <?php
            while ($item = mysqli_fetch_assoc($result)) {
                $produto = mysqli_fetch_assoc($obj_produto->select($item['idProduto']))
        ?>
                <tr>
                    <td><?php echo $produto['descricao']?></td>
                    <td><?php echo $produto['preco']?></td>
                    <td><?php echo $item['quantidade']?></td>
                    <td>
                        <form action="editaritemPedido.php" method="post">
                            <input type="hidden" name="idProduto" value="<?php echo $produto['idProduto'] ?>">
                            <input type="hidden" name="acao" value="editarItemPedido">
                            <input type="submit" value="Editar">
                        </form>
                        <form action="./Controller/controllerPedido.php" method="post">
                            <input type="hidden" name="idProduto" value="<?php echo $produto['idProduto'] ?>">
                            <input type="hidden" name="acao" value="excluirItemPedido">
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
        <?php
                $valorTotal += $produto['preco'] * $item['quantidade'];
            }
        ?>
    </table>
    <label>Valor total: R$ <?php echo $valorTotal ?></label>
    <form action="./Controller/controllerPedido.php" method="post">
        <input type="hidden" name="idPedido" value="<?php echo $_SESSION['idPedido']; ?>">
        <input type="hidden" name="acao" value="finalizarCompra">
        <input type="submit" value="Finalizar compra">
    </form>
</body>
</html>