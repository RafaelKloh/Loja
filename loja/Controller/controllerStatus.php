<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';

class Status
{
    public function insert($descricao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO status VALUES (null, '$descricao')";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function select()
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * FROM status";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function select_status($idStatus)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from status WHERE idStatus = $idStatus";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }
    public function update($idStatus, $descricao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE status SET descricao = '$descricao' WHERE idStatus = $idStatus";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function delete($idStatus)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "DELETE FROM status WHERE idStatus = '$idStatus'";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }
}