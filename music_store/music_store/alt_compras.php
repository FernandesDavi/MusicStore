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

$query2 = "INSERT INTO endereco (logradouro,numero,cep,complemento,cod_fornecedor) VALUES ('$lg','$nm',$cep,$cpm,$id)";


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
<h2> Alteração do Cadastro de Compras</h2>

	<div class="field">
		<label>Nome Fantasia:</label>
		<input type="text" name="nome" ><br>
		<p class="hint">Nome Fantasia</p>
</div>

<div class="field">	
<label>Cnpj:</label>
<input type="text" name="cnpj" ><br>
<p class="hint">CNPJ</p>
</div>

<div class="field">
<label>Inscrição Estadual:</label>
<input type="text" name="ie" ><br>
<p class="hint">Inscrição Estadual</p>
</div>


<div class="field">
<label>Telefone:</label>
<input type="text" name="tf"><br>
<p class="hint">Telefone</p>
</div>

<div class="field">
<label>Celular:</label>
<input type="text" name="cl"><br>
<p class="hint">Celular</p>
</div>

<div class="field">
<label>Logradouro:</label>
<input type="text" name="lg"><br>
<p class="hint">Logradouro</p>
</div>

<div class="field">
<label>Numero:</label>
<input type="text" name="numero"><br>
<p class="hint">Numero</p>
</div>

<div class="field">
<label>Cep:</label>
<input type="text" name="cep"><br>
<p class="hint">Cep</p>
</div>

<div class="field">
<label>Complemento:</label>
<input type="text" name="cpm"><br>
<p class="hint">Complemento</p>
</div>


<input type="submit" value="Cadastrar"  name="entrar"><br>


</div>
</form>



</body>
</html>
