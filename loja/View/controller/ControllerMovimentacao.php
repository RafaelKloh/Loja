<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerMovimentacao.php';
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerproduto.php';

$obj_mov = new Movimentacao();
$obj_produto = new Produto();

$acao = $_POST['acao'];

if ($acao == "cadastrar") {
    $descricao = $_POST['descricao'];
    $result = $obj_mov->insert($descricao);

    if ($result == true) {
        echo "Movimentacap cadastrada com sucesso";
    } else {
        echo "algo deu errado";
    }
} else if ($acao == "editarMov") {
    $idMov = $_POST['id'];
    $descricao = $_POST['descricao'];
    $result = $obj_mov->update($idMov, $descricao);

    if ($result == true) {
        echo "Movimentacao atualizada com sucesso";
    } else {
        echo "ocorreu um erro";
    }
} else if ($acao == "excluir") {
    $idMov = $_POST['id'];
    $result = $obj_mov->delete($idMov);

    if ($result == true) {
        echo "Funcao excluida com sucesso";
    } else {
        echo "Ocorreu um erro";
    }
}
else if ($acao == "registroMov")
{
    $idProduto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $idTipoMov = $_POST['tipoMov'];
    $error = false;

    $result = $obj_mov->insert_mov($idProduto,$quantidade,$idTipoMov);


    if ($error == false)
    {

    
    if ($result == true)
    {
        $resultado = $obj_produto->updateEstoque($idProduto, $quantidade);

        echo "Cadastrado com sucesso";
    }
    else{
        echo "Ocorreu um erro";
        $error = true;
    }
}

    
}
