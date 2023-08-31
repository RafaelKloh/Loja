<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';

class Funcao
{
    public function insert($descricao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO funcao VALUES (null, '$descricao')";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function select()
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from funcao";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function select_funcao($idFuncao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from funcao WHERE idFuncao = $idFuncao";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function update($idFuncao, $descricao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE funcao SET descricao = '$descricao' WHERE idFuncao = $idFuncao";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    public function delete($idFuncao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "DELETE FROM funcao WHERE idFuncao = '$idFuncao'";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }
}