<?php
include "conecta.inc";
include "menu.php";
$consulta = "

SELECT
    funcionario.cod_func,
    funcionario.nome,
    funcionario.cpf,
    funcionario.rg,
    funcionario.dtnasc,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    funcionario
        INNER JOIN
    telefone ON   funcionario.cod_func = telefone.cod_funcionario
        INNER JOIN
    endereco ON  funcionario.cod_func = endereco.cod_funcionario ;";

		echo '<center><br><br><br>';
		echo '<form id="cont2" class="rounded" method="post" action="frm_funcionario.php" name="form">';
		echo '<h2>Cadastro de Funcionário</h3><br>';

		echo '<table>';
		echo '<tr>';
		echo '<th>Código</th>';
		echo '<th>Nome</th>';
		echo '<th>CPF</th>';
		echo '<th>RG</th>';
    echo '<th>Data de Nascimento</th>';

		echo '<th>Telefone</th>';
		echo '<th>Celular</th>';
		echo '<th>Logradouro</th>';
		echo '<th>Numero</th>';
		echo '<th>CEP</th>';
		echo '<th>Complemento</th>';
		echo '<th>Alterar</th>';
		echo '<th>Excluir</th><br/><br/>';
$resultado = mysqli_query($conexao,$consulta);
while ($dados = mysqli_fetch_array($resultado)) {


echo'<tr>';
	echo '<td>'. $dados[0] . '</td>';
	echo '<td>'. $dados[1] . '</td>';
	echo '<td>'. $dados[2] . '</td>';
	echo '<td>'. $dados[3] . '</td>';
	echo '<td>'. $dados[4] . '</td>';
	echo '<td>'. $dados[5] . '</td>';
	echo '<td>'. $dados[6] . '</td>';
	echo '<td>'. $dados[7] . '</td>';
	echo '<td>'. $dados[8] . '</td>';
	echo '<td>'. $dados[9] . '</td>';
  echo '<td>'. $dados[10] . '</td>';

	$y = "<img src = 'excluir.png' >";
	$x = "<img src = 'alterar.png'>";

	echo "<td><center><a href='alt_funcionario.php?cod=$dados[0]'>$x</a></td>";
  echo "<td><center><a href='ext_funcionario.php?cod=$dados[0]'onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">$y</a></td>";
	echo '</tr>';

}
echo '</table>';
echo '</form>';
?>
