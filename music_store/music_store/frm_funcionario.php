<?php
include "menu.php";
include "conecta.inc";


if (!empty($_POST)) {
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
  $query1 = "INSERT INTO funcionario VALUES (null,'$nome',$cpf,$rg,'$dt')";

  $consulta = "select cod_func from funcionario order by cod_func desc limit 1";
  $resultado = mysqli_query($conexao,$consulta);
    if (mysqli_num_rows($resultado)<>0){
	      while ($dados = mysqli_fetch_array($resultado)) {
	         $id = $dados[0];
         }
         $id2 = $id + 1;
         echo($id2);
         $query2 = "INSERT INTO endereco (logradouro,numero,cep,complemento,cod_funcionario) VALUES ('$lg','$nm',$cep,'$cpm',$id2)";


         $query3= "INSERT INTO telefone (telefone,celular,cod_funcionario) VALUES ('$tf',$cl,$id2)";
  if (!mysqli_query($conexao, $query1)) $erro++;
  if (!mysqli_query($conexao, $query2)) $erro++;
  if (!mysqli_query($conexao, $query3)) $erro++;
/*  if(!mysql_query($query2)){
      $erro = mysql_error();
      echo "Ocorreu o seguinte erro: ", '"', $erro, '"';
  }*/

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
<form id="cont" class="rounded" method="post" action="frm_funcionario.php" name="form">
			<h2>Cadastro de Funcionário</h3>

			<div class="field">
				<label for="nome">Nome:</label>
				<input type="text" class="input" name="nome" id="nome" />
				<p class="hint">Nome</p>
			</div>
			<br>

			<div class="field">
				<label for="cpf">CPF:</label>
				<input type="text" class="input" name="cpf" id="cpf" />
				<p class="hint">CPF</p>
			</div>
			<br>

			<div class="field">
				<label for="rg">RG:</label>
				<input type="text" class="input" name="rg" id="rg" />
				<p class="hint">RG</p>
			</div>
			<br>

			<div class="field">
				<label for="dt">Nascimento:</label>
				<input type="date" class="input" name="dt" id="dt" />
				<p class="hint">Data de Nascimento</p>
			</div>
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
          <input type="text" class="input" name="lg" id="lg" "/>
        </textarea>
        <p class="hint">Logradouro.</p>
      </div>
      <br>



			<input type="submit" name="entrar"  class="button" value="Cadastrar" />
		</form>



  </body>
</html>
