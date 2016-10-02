<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
  $cod = $_POST["codigo"];
  $nome = $_POST["nome"];
  $tipo = $_POST["tipo"];
  $und = $_POST["unidade"];
  $vl = $_POST["valor"];
  $qtd = $_POST["quantidade"];
  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $query1 = "UPDATE produtos SET nome='$nome', tipo='$tipo', unidade='$und',valor='$vl',quantidade='$qtd' WHERE cod_prod = $cod";


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
        $consulta = " SELECT * FROM produtos WHERE cod_prod = '$cod'";
      	$resultado = mysqli_query($conexao,$consulta);
        $dados = mysqli_fetch_array($resultado);

      ?>
<form id="cont" class="rounded" method="post" action="alt_produtos.php" name="form">
			<h2>Cadastro de Produtos</h3>

			<div class="field">
				<label for="nome">Nome:</label>
				<input type="text" class="input" name="nome" id="nome" value="<?php echo $dados[1];?>"/>
				<p class="hint">Nome</p>
			</div>
			<br>

			<div class="field">
				<label for="tipo">Tipo:</label>
				<input type="text" class="input" name="tipo" id="tipo" value="<?php echo $dados[2];?>"/>
				<p class="hint">Tipo</p>
			</div>
			<br>

			<div class="field">
				<label for="unidade">Unidade:</label>
				<input type="text" class="input" name="unidade" id="unidade"value="<?php echo $dados[3];?>" />
				<p class="hint">Unidade</p>
			</div>
			<br>

			<div class="field">
				<label for="valor">Valor:</label>
				<input type="text" class="input" name="valor" id="valor"value="<?php echo $dados[4];?>" />
				<p class="hint">Valor</p>
			</div>
			<br>

			<div class="field">
				<label for="quantidade">Quantidade:</label>
				<input type="text" class="input" name="quantidade" id="quantidade"value="<?php echo $dados[5];?>" />
				<p class="hint">Quantidade</p>
			</div>
			<br>



      <input type="hidden" name="codigo" value="<?php echo $dados[0];?>"><br />

			<input type="submit" name="entrar"  class="button" value="Alterar" />
		</form>



  </body>
</html>
