<?php
include "conecta.inc";
include "menu.php";
$consulta = "
SELECT
    usuario.cod_user,
    usuario.usuario,
    usuario.senha,
    nivel_acesso.nivel_acesso,
    funcionario.nome

FROM
    usuario
        INNER JOIN
    nivel_acesso ON   usuario.cod_niv = nivel_acesso.cod_niv
        INNER JOIN
    funcionario ON  usuario.cod_func = funcionario.cod_func;";

		echo '<center><br><br><br>';
		echo '<form id="cont2" class="rounded" method="post" action="frm_funcionario.php" name="form">';
		echo '<h2>Cadastro de Usuário</h3><br>';

		echo '<table>';
		echo '<tr>';
		echo '<th>Código</th>';
		echo '<th>Usuario</th>';
		echo '<th>Senha</th>';
		echo '<th>Nivel de Acesso</th>';
		echo '<th>Funcionario</th>';
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


	$y = "<img src = 'excluir.png' >";
	$x = "<img src = 'alterar.png'>";

	echo "<td><center><a href='alt_usuario.php?cod=$dados[0]'>$x</a></td>";
  echo "<td><center><a href='ext_usuario.php?cod=$dados[0]'onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">$y</a></td>";
	echo '</tr>';

}
echo '</table>';
echo '</form>';
?>
