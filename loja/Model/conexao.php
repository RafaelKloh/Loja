<?php 

class Conexao
{
    public function conectar() 
    {
        $servidor = 'localhost';
        $usuario='root';
        $senha='';
        $nomeBanco='loja';
        $conexao = mysqli_connect($servidor,$usuario,$senha,$nomeBanco);

        return $conexao;
    }
}

?>