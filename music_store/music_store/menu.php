<html>
  <head>

    <meta charset="UTF-8">
         <script type="text/javascript">
 function relogio() {
     var hoje=new Date();
     var h=hoje.getHours();
     var m=hoje.getMinutes();
     var s=hoje.getSeconds();
     // add a zero in front of numbers<10
     m=checaHora(m);
     s=checaHora(s);
     document.getElementById('txt').innerHTML=h+":"+m+":"+s;
     t=setTimeout('relogio()',500);
 }

 function checaHora(i){
 if (i<10) {
     i="0" + i;
 }
     return i;
 }
		 </script>
		 <link href="menu.css" rel="stylesheet" media="all" />
		 <title>INTRANET - STORE MUSIC</title>


  </head>
  <body onload="relogio();">
    <?php
    include "valida_usuario.inc";
    ?>
    <ul>

	  <li>
		<a href="home.php">Home</a>
	  </li>

	  <li>
        Cadastros
        <ul>

          <a href="frm_funcionario.php"><li>Funcionario</li></a>
          <a href="frm_fornecedor.php"><li>Fornecedor</li></a>
          <a href="frm_usuario.php"><li>Usuario</li></a>
          <a href="frm_cliente.php"><li>Cliente</li></a>
          <a href="frm_contador.php"><li>Contador</li></a>
          <a href="frm_contas.php"><li>Contas</li></a>
          <a href="frm_produtos.php"><li>Produtos</li></a>

        </ul>
      </li>


      <li>
        Consulta
        <ul>

          <a href="bus_cliente.php"><li>Clientes</li></a>
          <a href="bus_funcionario.php"><li>Funcionarios</li></a>
          <a href="bus_contador.php"><li>Contador</li></a>
          <a href="bus_fornecedor.php"><li>Fornecedor</li></a>
          <a href="bus_usuario.php"><li>Usuario</li></a>
          <a href="bus_contas.php"><li>Contas</li></a>
          <a href="bus_produtos.php"><li>Produtos</li></a>



        </ul>
      </li>

        <li id="txt"></li>


	 <!-- <li>
	  Financeiro
		<ul>
			<li>Compras</li>
			<li>Vendas</li>
		</ul>
	  </li>-->
      <li><a href="sessao.php">SAIR</a></li>
    </ul>
