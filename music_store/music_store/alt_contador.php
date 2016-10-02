

<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
  $cod = $_POST["codigo"];
  $nome = $_POST["nome"];
  $cnpj = $_POST["cnpj"];
  $ie = $_POST["ie"];
  $tf = $_POST["tf"];
  $cl = $_POST["cl"];
  $lg = $_POST["lg"];
  $nm = $_POST["numero"];
  $cep = $_POST["cep"];
  $cpm = $_POST["cpm"];
  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $query1 = "UPDATE contador SET nome='$nome', cnpj='$cnpj', ie='$ie' WHERE cod_cont='$cod'";


   $query2 = "UPDATE endereco SET logradouro='$lg', numero='$nm', cep=$cep, complemento='$cpm' WHERE cod_contador='$cod'";


   $query3= "UPDATE telefone SET telefone='$tf',celular='$cl' WHERE cod_contador='$cod'";


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
  $consulta = " SELECT * FROM contador WHERE cod_cont = '$cod'";
  $consulta2 = "SELECT * FROM telefone WHERE cod_contador = '$cod'";
  $consulta3 = "SELECT * FROM endereco WHERE cod_contador = '$cod'";

	$resultado = mysqli_query($conexao,$consulta);
  $resultado2 = mysqli_query($conexao,$consulta2);
  $resultado3 = mysqli_query($conexao,$consulta3);

  $dados = mysqli_fetch_array($resultado);
  $dados2 = mysqli_fetch_array($resultado2);
  $dados3 = mysqli_fetch_array($resultado3);


    ?>

  <center><br><br><br>

<form id="cont" class="rounded" method="post" action="alt_contador.php" name="form">
			<h2>Cadastro de Contador</h3>

			<div class="field">
				<label for="nome">Nome:</label>
				<input type="text" class="input" name="nome" id="nome" value="<?php echo $dados[1]; ?>"/>
				<p class="hint">Nome</p>
			</div>
			<br>

			<div class="field">
				<label for="cnpj">CNPJ:</label>
				<input type="text" class="input" name="cnpj" id="cnpj" value="<?php echo $dados[2]; ?>"/>
				<p class="hint">CNPJ:</p>
			</div>
			<br>

			<div class="field">
				<label for="ie">Inscrição Estadual:</label>
				<input type="text" class="input" name="ie" id="ie" value="<?php echo $dados[3]; ?>"/>
				<p class="hint">Inscrição Estadual</p>
			</div>
			<br><br>

			<div class="field">
				<label for="tf">Telefone:</label>
				<input type="text" class="input" name="tf" id="tf" value="<?php echo $dados2[1]; ?>"/>
				<p class="hint">Telefone</p>
			</div>
			<br>

			<div class="field">
				<label for="cl">Celular:</label>
				<input type="text" class="input" name="cl" id="cl" value="<?php echo $dados2[2]; ?>"/>
				<p class="hint">Celular:</p>
			</div>
			<br>


			<div class="field">
				<label for="numero">Numero:</label>
				<input type="text" class="input" name="numero" id="numero" value="<?php echo $dados3[2]; ?>"/>
				<p class="hint">Numero:</p>
			</div>
			<br>

			<div class="field">
				<label for="cep">Cep:</label>
				<input type="text" class="input" name="cep" id="cep" value="<?php echo $dados3[3]; ?>"/>
				<p class="hint">Cep:</p>
			</div>
			<br>

			<div class="field">
				<label for="cpm">Complemento:</label>
				<input type="text" class="input" name="cpm" id="cpm" value="<?php echo $dados3[4]; ?>"/>
				<p class="hint">Complemento:</p>
			</div>
			<br>

			<div class="field">
				<label for="lg">Logradouro:</label>
        <input type="text" class="input" name="lg" id="lg" value="<?php echo $dados3[1]; ?>"><br>
				</textarea>
				<p class="hint">Logradouro.</p>
			</div>
			<br>

      <input type="hidden" name="codigo" value="<?php echo $dados[0];?>"><br />
			<input type="submit" name="entrar"  class="button" value="Alterar" />
		</form>




  </body>
</html>
