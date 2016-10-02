<!--valida_usuario.inc -->
<?php
//Esse sesion_start() inicia a sessão dando acesso ao vetor $_session[]/*
session_start();
//coletamos os dados existentes no vetor.../*
if ((IsSet($_SESSION['nome_usuario'])) and (IsSet($_SESSION['senha_usuario']))) {
   $nome_usuario=$_SESSION['nome_usuario'];
   $senha_usuario=$_SESSION['senha_usuario'];
}
else{
            unset($_SESSION['nome_usuario']);
            unset($_SESSION['senha_usuario']);
            echo "<script language='javascript' type='text/javascript'>alert('Você não Efetuou o login!!');window.location.href='index.php';</script>";
            exit;
    }
?>
