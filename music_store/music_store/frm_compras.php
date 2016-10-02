<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
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
  $query1 = "INSERT INTO fornecedor VALUES (null,'$nome',$cnpj,$ie)";

  $consulta = "select cod_forn from fornecedor order by cod_forn desc limit 1";
  $resultado = mysqli_query($conexao,$consulta);
    if (mysqli_num_rows($resultado)<>0){
	      while ($dados = mysqli_fetch_array($resultado)) {
	         $id = $dados[0];
         }

   $query2 = "INSERT INTO endereco (logradouro,numero,cep,complemento,cod_fornecedor) VALUES ('$lg','$nm',$cep,'$cpm',$id)";


   $query3= "INSERT INTO telefone (telefone,celular,cod_fornecedor) VALUES ('$tf',$cl,$id)";


  if (!mysqli_query($conexao, $query1)) $erro++;
  if (!mysqli_query($conexao, $query2)) $erro++;
  if (!mysqli_query($conexao, $query3)) $erro++;


   if ($erro == 0){

      mysqli_commit($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Dados inseridos com sucesso!!');window.location.href='home.php';</script>");
    } else{
      mysqli_rollback($conexao);
      echo("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='home.php';</script>");

    }
    }
  }
?>
<center><br><br><br>

<form id="cont" class="rounded" method="post" action="frm_compras.php" name="form">
			<h2>Cadastro de Compras</h3>
 
			<div class="field">
				<label for="nome">Nome Fantasia:</label>
				<input type="text" class="input" name="nome" id="nome" />
				<p class="hint">Nome Fantasia</p>
			</div>
			<br>
			
			<div class="field">
				<label for="cnpj">CNPJ:</label>
				<input type="text" class="input" name="cnpj" id="cnpj" />
				<p class="hint">CNPJ:</p>
			</div>
			<br>
			
			<div class="field">
				<label for="ie">Inscrição Estadual:</label>
				<input type="text" class="input" name="ie" id="ie" />
				<p class="hint">Inscrição Estadual</p>
			</div>
			<br>
			<br>
			<div class="field">
				<label for="tf">Telefone:</label>
				<input type="text" class="input" name="tf" id="tf" />
				<p class="hint">Telefone</p>
			</div>
			<br>
			
		
			<div class="field">
				<label for="cl">Celular:</label>
				<input type="text" class="input" name="cl" id="cl" />
				<p class="hint">Celular:</p>
			</div>
			<br>
			
			
			
			<div class="field">
				<label for="numero">Numero:</label>
				<input type="text" class="input" name="numero" id="numero" />
				<p class="hint">Numero:</p>
			</div>
			<br>
			
			<div class="field">
				<label for="cep">Cep:</label>
				<input type="text" class="input" name="cep" id="cep" />
				<p class="hint">Cep:</p>
			</div>
			<br>
			
			<div class="field">
				<label for="cpm">Complemento:</label>
				<input type="text" class="input" name="cpm" id="cpm" />
				<p class="hint">Complemento:</p>
			</div>
			<br>
			
			<div class="field">
				<label for="lg">Logradouro:</label>
				<textarea class="input textarea" name="lg" id="lg">
				</textarea>
				<p class="hint">Logradouro.</p>
			</div>
			<br>
			
			<input type="submit" name="entrar"  class="button" value="Cadastrar" />
		</form>



  </body>
</html>
