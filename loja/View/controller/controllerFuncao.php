<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerFuncao.php';

$obj_funcao = new Funcao();

$acao = $_POST['acao'];

if ($acao == "cadastrar") {
    $descricao = $_POST['descricao'];
    $result = $obj_funcao->insert($descricao);

    if ($result == true) {
        echo "Função cadastrada com sucesso";
    } else {
        echo "algo deu errado";
    }
} else if ($acao == "editarFuncao") {
    $idFuncao = $_POST['id'];
    $descricao = $_POST['descricao'];
    $result = $obj_funcao->update($idFuncao, $descricao);

    if ($result == true) {
        echo "função atualizada com sucesso";
    } else {
        echo "ocorreu um erro";
    }
} else if ($acao == "excluir") {
    $idFuncao = $_POST['id'];
    $result = $obj_funcao->delete($idFuncao);

    if ($result == true) {
        echo "Funcao excluida com sucesso";
    } else {
        echo "Ocorreu um erro";
    }
}
