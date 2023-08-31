<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';

class Movimentacao
{
    public function insert($descricao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO tipo_movimentacao VALUES (null, '$descricao')";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function select()
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from tipo_movimentacao";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function select_mov($idTipoMovimentacao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from tipo_movimentacao WHERE idTipoMovimentacao = $idTipoMovimentacao";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function update($idTipoMovimentacao, $descricao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE tipo_movimentacao SET descricao = '$descricao' WHERE idTipoMovimentacao = $idTipoMovimentacao";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function delete($idMov)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "DELETE FROM tipo_movimentacao WHERE idTipoMovimentacao = '$idMov'";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function insert_mov($idProduto,$quantidade,$idTipoMov)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO movimentacao_estoque VALUES (null, $idProduto, $quantidade,$idTipoMov )";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }
}