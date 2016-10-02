<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
  $nome = $_POST["nome"];
  $tipo = $_POST["tipo"];
  $und = $_POST["unidade"];
  $vl = $_POST["valor"];
  $qtd = $_POST["quantidade"];
  mysqli_autocommit($conexao, FALSE);
  $erro = 0;
  $query1 = "INSERT INTO produtos VALUES (null,'$tipo','$nome',$und,$vl,$qtd)";


  if (!mysqli_query($conexao, $query1)) $erro++;

   if ($erro == 0){

      mysqli_commit($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Dados inseridos com sucesso!!');window.location.href='home.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='home.php';</script>");

    }

  }
?><center><br><br><br>

<form id="cont" class="rounded" method="post" action="frm_produtos.php" name="form">
			<h2>Cadastro de Produtos</h3>
 
			<div class="field">
				<label for="nome">Nome:</label>
				<input type="text" class="input" name="nome" id="nome" />
				<p class="hint">Nome</p>
			</div>
			<br>
			
			<div class="field">
				<label for="tipo">Tipo:</label>
				<input type="text" class="input" name="tipo" id="tipo" />
				<p class="hint">Tipo</p>
			</div>
			<br>
			
			<div class="field">
				<label for="unidade">Unidade:</label>
				<input type="text" class="input" name="unidade" id="unidade" />
				<p class="hint">Unidade</p>
			</div>
			<br>
			
			<div class="field">
				<label for="valor">Valor:</label>
				<input type="text" class="input" name="valor" id="valor" />
				<p class="hint">Valor</p>
			</div>
			<br>
			
			<div class="field">
				<label for="quantidade">Quantidade:</label>
				<input type="text" class="input" name="quantidade" id="quantidade" />
				<p class="hint">Quantidade</p>
			</div>
			<br>
			
			
			
			
			<input type="submit" name="entrar"  class="button" value="Cadastrar" />
		</form>





  </body>
</html>
