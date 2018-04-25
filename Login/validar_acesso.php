<?php

	require_once('../db.class.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = " SELECT * FROM usuarios WHERE nome = '$nome' AND email = '$email' AND senha = '$senha'";

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['nome'])){
			echo 'nome existe';
		}

		else{
			header('Location: index.php?erro=1');
		}

	}

	else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}
?>