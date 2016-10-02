<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
  $cod = $_POST["codigo"];
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $rg = $_POST["rg"];
  $dt = $_POST["dt"];
  $tf = $_POST["tf"];
  $cl = $_POST["cl"];
  $lg = $_POST["lg"];
  $nm = $_POST["numero"];
  $cep = $_POST["cep"];
  $cpm = $_POST["cpm"];
  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $query1 = "UPDATE cliente SET nome_cli='$nome', cpf='$cpf', rg='$rg', dtnasc='$dt' WHERE cod_cli='$cod'";


   $query2 = "UPDATE endereco SET logradouro='$lg', numero='$nm', cep=$cep, complemento='$cpm' WHERE cod_cliente='$cod'";


   $query3= "UPDATE telefone SET telefone='$tf',celular='$cl' WHERE cod_cliente='$cod'";


  if (!mysqli_query($conexao, $query1)) $erro++;
  if (!mysqli_query($conexao, $query2)) $erro++;
  if (!mysqli_query($conexao, $query3)) $erro++;



   if ($erro == 0){

      mysqli_commit($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Dados Alterados com sucesso!!');window.location.href='home.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='home.php';</script>");

    }
    }

?>

<?php


  include "conecta.inc";
  $cod = $_GET["cod"];
  $consulta = " SELECT * FROM cliente WHERE cod_cli = '$cod'";
  $consulta2 = "SELECT * FROM telefone WHERE cod_cliente = '$cod'";
  $consulta3 = "SELECT * FROM endereco WHERE cod_cliente = '$cod'";

	$resultado = mysqli_query($conexao,$consulta);
  $resultado2 = mysqli_query($conexao,$consulta2);
  $resultado3 = mysqli_query($conexao,$consulta3);

  $dados = mysqli_fetch_array($resultado);
  $dados2 = mysqli_fetch_array($resultado2);
  $dados3 = mysqli_fetch_array($resultado3);


?>
<center><br><br><br>
<form id="cont" class="rounded" method="post" action="alt_cliente.php" name="form">
			<h2>Alteração de Cadastro do Fornecedor</h3>

<div class="field">
<label for="nome">Nome:</label>
<input type="text" class="input" name="nome" id="nome" value="<?php echo $dados[1]; ?>"><br>
</div>
</br>

<div class="field">
<label for="cpf">CPF:</label>
<input type="text" class="input" name="cpf" id="cpf" value="<?php echo $dados[2]; ?>"><br>
</div>
</br>

<div class="field">
<label>RG:</label>
<input type="text" class="input" name="rg" id="rg" value="<?php echo $dados[3]; ?>"><br>
</div>
</br>

<div class="field">
<label>Nascimento:</label>
<input type="date" class="input" name="dt" id="dt" value="<?php echo $dados[4]; ?>"><br>
</div>
</br>

<div class="field">
<label>Telefone:</label>
<input type="text" class="input" name="tf" id="tf" value="<?php echo $dados2[1]; ?>"><br>
</div>
</br>

<div class="field">
<label>Celular:</label>
<input type="text" class="input" name="cl" id="cl" value="<?php echo $dados2[2]; ?>"><br>
</div>
</br>

<div class="field">
<label>Logradouro:</label>
<input type="text" class="input" name="lg" id="lg" value="<?php echo $dados3[1]; ?>"><br>
</div>
</br>

<div class="field">
<label>Numero:</label>
<input type="text" class="input" name="numero" id="numero" value="<?php echo $dados3[2]; ?>"><br>
</div>
</br>

<div class="field">
<label>Cep:</label>
<input type="text" class="input" name="cep" id="cep" value="<?php echo $dados3[3]; ?>"><br>
</div>
</br>

<div class="field">
<label>Complemento:</label>
<input type="text" class="input" name="cpm"  value="<?php echo $dados3[4]; ?>"><br>
</div>
</br>

<input type="hidden" name="codigo" value="<?php echo $dados[0];?>"><br />
<input type="submit" class="button" value="Alterar"  name="entrar"><br>



  </body>
</html>
