    <?php
    include "menu.php";
    include "conecta.inc";
    if (!empty($_POST)) {
      $cod = $_POST["codigo"];
      $usr = $_POST["usuario"];
      $sen = $_POST["senha"];
      $nv = $_POST["nv_acesso"];
      $func = $_POST["func"];

      echo($cod);
      mysqli_autocommit($conexao, FALSE);
      $erro = 0;
      $query1 = "UPDATE usuario SET usuario='$usr', senha='$sen', cod_niv='$nv',cod_func='$func' WHERE cod_user = $cod";
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

    <?php


      include "conecta.inc";
      $cod = $_GET["cod"];
      $consulta = " SELECT * FROM usuario WHERE cod_user = '$cod'";
    	$resultado = mysqli_query($conexao,$consulta);
      $dados = mysqli_fetch_array($resultado);

    ?>
    <center><br><br><br>
    <form id="cont" class="rounded" method="post" action="alt_usuario.php" name="form">
			<h2>Formulario de Usuario</h3>

			<div class="field">
				<label for="usuario">Usuario:</label>
				<input type="text" class="input" name="usuario" id="usuario" value="<?php echo $dados[1];?>"/>
				<p class="hint">Usuario</p>
			</div>
			<br>

			<div class="field">
				<label for="senha">Senha:</label>
				<input type="password" class="input" name="senha" id="senha" value="<?php echo $dados[2];?>"/>
				<p class="hint">Senha:</p>
			</div>
			<br>

			<div class="field">
				<label for="nv_acesso">Nivel Acesso:</label>
				<select class="input" name="nv_acesso" id="nv_acesso" />
				<?php
    include "conecta.inc";
    $consulta = "select * from nivel_acesso";
    $resultado = mysqli_query($conexao,$consulta);

    while ($dados2 = mysqli_fetch_array($resultado))
     {

    echo '<option value="'.$dados2[0].'">'.$dados2[1].'</option>';

    }?>
			</select><br>
			<p class="hint">Nivel de acesso do funcionário no sistema</p>
			</div>
			<br>

			<div class="field">
				<label for="func">Funcionário:</label>
				<select  class="input" name="func" id="func" />
				<?php
		include "conecta.inc";
		$consulta = "select * from Funcionario";
		$resultado = mysqli_query($conexao,$consulta);

		while ($dados3 = mysqli_fetch_array($resultado))
		{

		echo '<option value="'.$dados3[0].'">'.$dados3[1].'</option>';

		}

        ?>
				</select><br>
				<p class="hint">Funcionário</p>
			</div>
		<br>
    <input type="hidden" name="codigo" value="<?php echo $dados[0];?>"><br />
		  <input type="submit" name="entrar"  class="button" value="Alterar" />
		</form>


      </body>
    </html>
