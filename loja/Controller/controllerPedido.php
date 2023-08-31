<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';

class Pedido {
    public function select($idUsuario) {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * FROM pedido WHERE idUsuario = $idUsuario AND idStatus = 1";
        $result = mysqli_query($conexao, $sql);

        return mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : false;
    }

    public function insert($idUsuario) {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO pedido VALUES (NULL, $idUsuario, 1)";
        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function updateStatus($idPedido) {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE pedido SET idStatus = 2 WHERE idPedido = $idPedido";
        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function update_quantidade($idProduto,$quantidade)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE item_pedido SET quantidade = $quantidade WHERE idProduto = $idProduto";
        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function delete_quantidade($idProduto)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();


        $sql = "DELETE FROM item_pedido WHERE idProduto = $idProduto";
        $result = mysqli_query($conexao, $sql);

        return $result;
    }
}