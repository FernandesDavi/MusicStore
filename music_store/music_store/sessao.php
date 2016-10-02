<?php
session_start();

unset($_SESSION['nome_usuario']);
unset($_SESSION['senha_usuario']);

session_destroy();

echo "Good Bay!!!";
header("Location: index.php");

?>
