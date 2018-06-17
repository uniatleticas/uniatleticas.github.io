<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: ../../index.php?erro=1');
	}

	require_once('../../db.class.php');

	$texto_msg = $_POST['texto_msg'];
	$id_usuario = $_SESSION['id_usuario'];

	if($texto_msg == '' || $id_usuario == ''){
		die();
	}

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$sql = " INSERT INTO msg_engcivil(id_usuario, msg)values($id_usuario, '$texto_msg') ";

	mysqli_query($link, $sql);

?>