    <?php
    include "menu.php";
    include "conecta.inc";
    if (!empty($_POST)) {
      $usr = $_POST["usuario"];
      $sen = $_POST["senha"];
      $nv = $_POST["nv_acesso"];
      $func = $_POST["func"];


      $insere = "INSERT INTO usuario VALUES (null,'$usr','$sen',$nv,$func)";
      mysqli_query($conexao, $insere) or die ("<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro!!');window.location.href='usuario.php';</script>");
      echo("<script language='javascript' type='text/javascript'>alert('Dados Inseridos com Sucesso!!');window.location.href='home.php';</script>");

    }
    ?>
	
	<center><br><br><br>
    <form id="cont" class="rounded" method="post" action="frm_usuario.php" name="form">
			<h2>Formulario de Usuario</h3>
 
			<div class="field">
				<label for="usuario">Usuario:</label>
				<input type="text" class="input" name="usuario" id="usuario" />
				<p class="hint">Usuario</p>
			</div>
			<br>
			
			<div class="field">
				<label for="senha">Senha:</label>
				<input type="password" class="input" name="senha" id="senha" />
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

    while ($dados = mysqli_fetch_array($resultado))
     {

    echo '<option value="'.$dados[0].'">'.$dados[1].'</option>';

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

		while ($dados = mysqli_fetch_array($resultado))
		{

		echo '<option value="'.$dados[0].'">'.$dados[1].'</option>';

		}

        ?>
				</select><br>
				<p class="hint">Funcionário</p>
			</div>
			<br>
			
		<input type="submit" name="entrar"  class="button" value="Cadastrar" />
		</form>



      </body>
    </html>
