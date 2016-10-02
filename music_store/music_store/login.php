<?php

  include "conecta.inc";

$usuario = $_POST["login"];
$senha = $_POST["senha"];
$consulta = "SELECT usuario,senha FROM usuario WHERE usuario = '$usuario' and senha='$senha'";
$resultado = mysqli_query($conexao,$consulta);
if (mysqli_num_rows($resultado)<>0){

    session_start();
    $_SESSION['nome_usuario']=$usuario;
    $_SESSION['senha_usuario']=$senha;
    header("Location: home.php");
}
else
{

  echo("<script language='javascript' type='text/javascript'>alert('login ou senhas incorretas!!');window.location.href='index.php';</script>");}
?>
