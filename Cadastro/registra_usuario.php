<?php

	require_once('../db.class.php');

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];


	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$sql = "insert into usuarios(email, senha, nome, sobrenome) values ('$email', '$senha', '$nome', '$sobrenome')";

	//executar a quary
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	}
	else{
		echo 'Erro ao registrar o usuário!';
	}

?>