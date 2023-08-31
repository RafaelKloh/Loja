<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/loja/Model/conexao.php';



class Compra
{
    public function verificar_commpra($idUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from pedido WHERE idUsuario = $idUsuario AND idStatus = 1";

        $result = mysqli_query($conexao, $sql);

        return mysqli_num_rows($result) > 0 ? true: false;
    }

    public function select_produto($idProduto)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $sql = "SELECT * from produto";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }



    public function insert($idUsuario)
    {
        $obj_conexao = new Conexao();
        $conexao = $obj_conexao->conectar();

        $idStatus = 1;

        session_start();
        $idUsuario = $_SESSION['idUsuario'];
        

        $sql = "INSERT INTO pedido VALUES (null, $idUsuario, $idStatus)";

        $result = mysqli_query($conexao, $sql);

        return $result;
    }

    

}
