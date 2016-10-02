<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
  $conta = $_POST["conta"];
  $valor = $_POST["valor"];
  $dt = $_POST["dt"];
  $cnt = $_POST["slcontador"];
  $func = $_POST["slfuncionario"];
  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $query1 = "INSERT INTO contas VALUES (null,'$conta','$valor','$dt',$cnt,$func)";


  if (!mysqli_query($conexao, $query1)) $erro++;

   if ($erro == 0){

      mysqli_commit($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Dados inseridos com sucesso!!');window.location.href='home.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='home.php';</script>");
	      }

  }
?>
<center><br><br><br>

<form id="cont" class="rounded" method="post" action="frm_contas.php" name="form">
			<h2>Cadastro de Contas</h3>

			<div class="field">
				<label for="conta">Conta:</label>
				<input type="text" class="input" name="conta" id="nome" />
				<p class="hint">Conta</p>
			</div>
			<br>

			<div class="field">
				<label for="valor">Valor:</label>
				<input type="text" class="input" name="valor" id="valor" />
				<p class="hint">Valor</p>
			</div>
			<br>

			<div class="field">
				<label for="dt">Vencimento:</label>
				<input type="date" class="input" name="dt" id="dt" />
				<p class="hint">Vencimento</p>
			</div>
			<br>

			<div class="field">
				<label for="slcontador">Contador:</label>
				<select class="input" name="slcontador" id="slcontador" />
				<?php


				include "conecta.inc";
				$consulta = "select * from contador";
				$resultado = mysqli_query($conexao,$consulta);

				while ($dados = mysqli_fetch_array($resultado))
				{

					echo '<option value="'.$dados[0].'">'.$dados[1].'</option>';

				}?>
</select><br/>

				<p class="hint">Contador</p>
			</div>
			<br>

			<div class="field">
				<label for="slfuncionario">Funcionário:</label>
				<select class="input" name="slfuncionario" id="slfuncionario" />
				<?php

					include "conecta.inc";
					$consulta = "select * from funcionario";
					$resultado = mysqli_query($conexao,$consulta);

					while ($dados = mysqli_fetch_array($resultado))
					{

						echo '<option value="'.$dados[0].'">'.$dados[1].'</option>';

					}?>
</select><br/>


				<p class="hint">Funcionário</p>
			</div>
			<br>




			<input type="submit" name="entrar"  class="button" value="Cadastrar" />
		</form>




  </body>
</html>
