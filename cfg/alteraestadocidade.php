<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('../db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

	$objDb = new db();
    $link = $objDb->conecta_mysql();

    mysqli_query ($link,"UPDATE usuarios SET estado = '$estado' WHERE id = $id_usuario");
    mysqli_query ($link,"UPDATE usuarios SET cidade = '$cidade' WHERE id = $id_usuario");
    echo 'Alterado com sucesso!';
?>