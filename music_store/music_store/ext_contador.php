<?php
include "conecta.inc";
include "menu.php";
$cod = $_GET["cod"];
mysqli_autocommit($conexao, FALSE);
$erro = 0;

	$exclui = " DELETE FROM contador WHERE cod_cont = '$cod'";

  if (!mysqli_query($conexao, $exclui)) $erro++;
	if ($erro == 0){

		mysqli_commit($conexao);
		echo("<script language='javascript' type='text/javascript'>alert('Dados Excuido com sucesso!!');window.location.href='home.php';</script>");
	} else{
		mysqli_rollback($conexao);
		echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='home.php';</script>");

	}
?>
