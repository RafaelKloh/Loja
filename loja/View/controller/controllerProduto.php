<?php
include $_SERVER['DOCUMENT_ROOT'].'/loja/Controller/controllerProduto.php';

$obj_produto = new Produto ();

$acao = $_POST['acao'];

if ($acao == "cadastroProduto")
{
    $descricao = $_POST['nome'];
    $preco = $_POST['preco'];
    $error = false;

    $result = $obj_produto->insert($descricao, $preco);

    if ($result == true)
    {
        echo "Produto inserido com sucesso";
    }
    else 
    {
        echo "algo deu errado";
    }
}

else if ($acao == "editarProduto")
{
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $idProduto = $_POST['id'];
    $error = false;

    $result = $obj_produto->update($idProduto,$descricao, $preco);

    if ($result == true)
    {
        echo "Produto atualizado com sucesso";
    }
    else 
    {
        echo "algo deu errado";
    }
}

else if ($acao == "excluir")
{
    $idProduto = $_POST['id'];
    $result = $obj_produto->delete($idProduto);

    if ($result == true)
    {
        echo "produto excluido com sucesso";
    }

    else {
        echo "ocorreu um erro";
    }


}
?>
