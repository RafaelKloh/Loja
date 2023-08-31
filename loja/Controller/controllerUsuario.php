<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';



class Usuario 
{
    public function select()
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from usuario ";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function verificar($nomeUsuario,$senhaUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from usuario WHERE nomeUsuario = '$nomeUsuario' AND senhaUsuario = '$senhaUsuario' ";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    

    public function select_usuario($idUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from usuario WHERE idUsuario = $idUsuario";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function select_funcao()
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from funcao";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function insert($nomeUsuario,$senhaUsuario,$emailUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO usuario VALUES (null, '$nomeUsuario', '$senhaUsuario', '$emailUsuario', 1)";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function insert_adm($nomeUsuario,$senhaUsuario,$emailUsuario,$idFuncao)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "INSERT INTO usuario VALUES (null, '$nomeUsuario', '$senhaUsuario', '$emailUsuario', $idFuncao)";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }
    public function update_admin($nomeUsuario,$senhaUsuario,$emailUsuario,$funcaoUsuario,$idUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "UPDATE usuario SET nomeUsuario = '$nomeUsuario', senhaUsuario = '$senhaUsuario', emailUsuario = '$emailUsuario', idFuncao = $funcaoUsuario WHERE idUsuario = $idUsuario";

        $result = mysqli_query($conexao,$sql);

        return $result;
    }

    public function delete($idUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "DELETE FROM usuario WHERE idUsuario = $idUsuario";
        $result = mysqli_query($conexao,$sql);

        return $result;
    }
}