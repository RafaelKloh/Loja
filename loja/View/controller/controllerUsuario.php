<?php
include $_SERVER['DOCUMENT_ROOT'] . '/loja/Controller/controllerUsuario.php';

$obj_usuario = new Usuario();

$acao = $_POST['acao'];
//verificar usuario
if ($acao == "VerificarUsuario") {
    $nomeUsuario = $_POST['Usuario'];
    $senhaUsuario = $_POST['Senha'];
    $error = false;

    if ($nomeUsuario == "" || $senhaUsuario == "") {
        echo "Preencha todos os campos";
        $error = true;
    }

    if ($error == false) {
        $retorno = $obj_usuario->verificar($nomeUsuario,$senhaUsuario);
        $usuario = mysqli_fetch_assoc($retorno);


        //so salva
        session_start();
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['idFuncao'] = $usuario['idFuncao'];


        if ($usuario['idFuncao'] == 1) {
            header('Location: ../listaProdutos.php');
            exit();
        }

        if ($usuario['idFuncao'] == 2) {
            header('Location: ../listaUsuarios.php');
            exit();
        }
    }
}
 else if ($acao == "cadastrar") {
    $nomeUsuario = $_POST['usuario'];
    $emailUsuario = $_POST['email'];
    $senhaUsuario = $_POST['senha'];
    $confirmaSenha = $_POST['confirmasenha'];
    $error = false;

    if ($nomeUsuario == "" || $senhaUsuario == "" || $confirmaSenha == "" || $emailUsuario == "") {
        echo "Preencha todos os campos";
        $error = true;
    }

   
    if ($senhaUsuario != $confirmaSenha) {
        echo "As senhas nao conferem";
        $error = true;
    }

    if ($error == false) {
        $retorno = $obj_usuario->insert($nomeUsuario, $senhaUsuario, $emailUsuario);

        if ($retorno == true) {
            echo "Deu certo";
        } else {
            echo "algo deu errado";
        }
    }
} else if ($acao == "editarusuario") {
    $idUsuario = $_POST['id'];
    $nomeUsuario = $_POST['usuario'];
    $senhaUsuario = $_POST['senha'];
    $emailUsuario = $_POST['email'];
    $funcaoUsuario = $_POST['funcao'];
    $error = false;

    if ($nomeUsuario == "" || $senhaUsuario == "" || $emailUsuario == "" || $funcaoUsuario == "") {
        echo "Preencha todos os campos";
        $error = true;
    }

    if ($funcaoUsuario > 2 || $funcaoUsuario < 1)
    {
        echo "essa função não existe";
        $error = true;
    }

    else if ($funcaoUsuario == 1 || $funcaoUsuario == 2) 
    {
        if ($error == false) 
        {

            $retorno = $obj_usuario->update_admin($nomeUsuario, $senhaUsuario, $emailUsuario, $funcaoUsuario,$idUsuario);

            if ($retorno == true) 
            {
                echo "Usuario atualizado com sucesso";
            }
        }
    }
}

else if ($acao == "excluir")
{
    $idUsuario = $_POST['id'];
    $error = false;

    $retorno = $obj_usuario->delete($idUsuario);

    
    if ($retorno == true)
    {
        echo "Usuario excluido";
    }
    else 
    {
        echo "ocorreu um erro ao tentar excluir o usuario";
        $error = true;
    }
    
}


else if ($acao == "cadastrarADM")
{
    $nomeUsuario = $_POST['usuario'];
    $senhaUsuario = $_POST['senha'];
    $emailUsuario = $_POST['email'];
    $confirmaSenha = $_POST['confirmasenha'];
    $idFuncao = $_POST['funcao'];
    $error = false;

    if ($nomeUsuario == "" || $senhaUsuario == "" || $emailUsuario == "" || $idFuncao =="") {
        echo "Preencha todos os campos";
        $error = true;
    }

    if ($senhaUsuario != $confirmaSenha) {
        echo "as senhas nao conferem";
        $error = true;
    }

    if ($error == false) {
        $retorno = $obj_usuario->insert($nomeUsuario, $senhaUsuario, $emailUsuario,$idFuncao);

        if ($retorno == true) {
            echo "Deu certo";
        } else {
            echo "algo deu errado";
        }
    }
}
