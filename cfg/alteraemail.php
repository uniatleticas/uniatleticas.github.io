<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('../db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $antigo_email = $_POST['email'];
    $novo_email = $_POST['novoemail'];

	$objDb = new db();
    $link = $objDb->conecta_mysql();
    
    $email = mysqli_query ($link,"SELECT email FROM usuarios WHERE id = $id_usuario");
    $rowemail= mysqli_fetch_array($email);
    $getemail=$rowemail['email'];

    if($antigo_email == $getemail){
    mysqli_query ($link,"UPDATE usuarios SET email = '$novo_email' WHERE id = $id_usuario");
    echo 'Alterado com sucesso!';
    } else{
        echo 'Este email é diferente do cadastrado no sistema. Tente Novamente.';
    }