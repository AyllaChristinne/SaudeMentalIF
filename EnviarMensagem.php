<?php
	require_once "ConexaoBD.php";
	$nome = $_POST['nome'];
	$msg = $_POST['msg'];
	mysqli_query($CON, "INSERT INTO `mensagem`(`codigo`, `nome`, `msg`, `data`) VALUES (DEFAULT, '".$nome."', '".$msg."', now())") or die (mysqli_error());
	header("Location: index.php");
	mysqli_close($CON);
?>