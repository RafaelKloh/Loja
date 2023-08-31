<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';



class Produto
{
    public function select($id = false)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from produto";

        if ($id != false) {
            $sql .= " WHERE idProduto = $id";
        }

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function insert($descricao, $preco)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO produto VALUES (null,'$descricao',$preco, 1)";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function update($idProduto,$descricao, $preco)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE produto SET descricao = '$descricao', preco = $preco WHERE idProduto = $idProduto";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }
    public function delete($idProduto)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "DELETE FROM produto WHERE idProduto = $idProduto";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function updateEstoque($idProduto, $quantidade) {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE produto SET estoque = estoque - $quantidade WHERE idProduto = $idProduto";

        mysqli_query($conexao, $sql);
    }

}
