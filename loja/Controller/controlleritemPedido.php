<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';

class ItemPedido {
    public function select($id = false) {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * FROM item_pedido";

        if ($id != false) {
            $sql .= " WHERE idPedido = $id";
        }

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function insert($idPedido, $idProduto) {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();


        $sql = "INSERT INTO item_pedido VALUES (NULL, $idPedido,  $idProduto,1)";
        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    
}