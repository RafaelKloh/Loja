<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerStatus.php';

$obj_status = new Status();

$acao = $_POST['acao'];

if ($acao == "cadastrar") {
    $descricao = $_POST['descricao'];
    $result = $obj_status->insert($descricao);

    if ($result == true) {
        echo "Status cadastrada com sucesso";
    } else {
        echo "algo deu errado";
    }
} else if ($acao == "editarStatus") {
    $idStatus = $_POST['id'];
    $descricao = $_POST['descricao'];
    $result = $obj_status->update($idStatus, $descricao);

    if ($result == true) {
        echo "Status atualizada com sucesso";
    } else {
        echo "ocorreu um erro";
    }
} else if ($acao == "excluir") {
    $idStatus = $_POST['id'];
    $result = $obj_status->delete($idStatus);

    if ($result == true) {
        echo "Status excluido com sucesso";
    } else {
        echo "Ocorreu um erro";
    }
}
