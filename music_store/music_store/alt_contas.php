<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
  $cod = $_POST["codigo"];
  $conta = $_POST["conta"];
  $valor = $_POST["valor"];
  $dt = $_POST["dt"];
  $cnt = $_POST["slcontador"];
  $func = $_POST["slfuncionario"];
  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $query1 = "UPDATE contas SET conta='$conta', valor='$valor', dtvenc='$dt',cod_cont='$cnt',cod_func='$func' WHERE cod_conta = $cod";
echo($query1);
  if (!mysqli_query($conexao, $query1)) $erro++;

   if ($erro == 0){

      mysqli_commit($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Dados Alterados com sucesso!!');window.location.href='home.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='home.php';</script>");

    }

  }
?>
<center><br><br><br>

  <?php


    include "conecta.inc";
    $cod = $_GET["cod"];
    $consulta = " SELECT * FROM contas WHERE cod_conta = '$cod'";

  	$resultado = mysqli_query($conexao,$consulta);

    $dados1 = mysqli_fetch_array($resultado);


  ?>
<form id="cont" class="rounded" method="post" action="alt_contas.php" name="form">
			<h2>Cadastro de Contas</h3>

			<div class="field">
				<label for="conta">Conta:</label>
				<input type="text" class="input" name="conta" id="nome" value="<?php echo $dados1[1]; ?>"/>
				<p class="hint">Conta</p>
			</div>
			<br>

			<div class="field">
				<label for="valor">Valor:</label>
				<input type="text" class="input" name="valor" id="valor" value="<?php echo $dados1[2]; ?>"/>
				<p class="hint">Valor</p>
			</div>
			<br>

			<div class="field">
				<label for="dt">Vencimento:</label>
				<input type="date" class="input" name="dt" id="dt" value="<?php echo $dados1[3]; ?>"/>
				<p class="hint">Vencimento</p>
			</div>
			<br>

			<div class="field">
				<label for="slcontador">Contador:</label>
				<select class="input" name="slcontador" id="slcontador"/>
				<?php


				include "conecta.inc";
				$consulta = "select * from contador";
				$resultado2 = mysqli_query($conexao,$consulta);

				while ($dados = mysqli_fetch_array($resultado2))
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



      <input type="hidden" name="codigo" value="<?php echo $dados1[0];?>"><br />

			<input type="submit" name="entrar"  class="button" value="Alterar" />
		</form>



  </body>
</html>
