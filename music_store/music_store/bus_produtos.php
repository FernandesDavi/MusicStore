<?php
include "conecta.inc";
include "menu.php";
$consulta = "select * from produtos;";

		echo '<center><br><br><br>';
		echo '<form id="cont2" class="rounded" method="post" action="frm_funcionario.php" name="form">';
		echo '<h2>Cadastro de Produtos</h3><br>';

		echo '<table>';
		echo '<tr>';
		echo '<th>Codigo</th>';

		echo '<th>Nome</th>';
		echo '<th>Tipo</th>';
		echo '<th>Unidade</th>';
		echo '<th>Valor</th>';
    echo '<th>Quantidade</th>';
		echo '<th>Alterar</th>';
		echo '<th>Excluir</th><br/><br/>';
$resultado = mysqli_query($conexao,$consulta);
while ($dados = mysqli_fetch_array($resultado)) {


echo'<tr>';
	echo '<td>'. $dados[0] . '</td>';
	echo '<td>'. $dados[2] . '</td>';
	echo '<td>'. $dados[1] . '</td>';
	echo '<td>'. $dados[3] . '</td>';
	echo '<td>'. $dados[4] . '</td>';
  echo '<td>'. $dados[5] . '</td>';



	$y = "<img src = 'excluir.png' >";
	$x = "<img src = 'alterar.png'>";

	echo "<td><center><a href='alt_produtos.php?cod=$dados[0]'>$x</a></td>";
	echo "<td><center><a href='ext_prod.php?cod=$dados[0]'onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">$y</a></td>";
	echo '</tr>';

}
echo '</table>';
echo '</form>';
?>
