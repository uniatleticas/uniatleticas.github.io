<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('../db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $senha_antiga = md5($_POST['senha']);
    $nova_senha = md5($_POST['novasenha']);
    $confirma_nova_senha = md5($_POST['confirmarnovasenha']);

	$objDb = new db();
    $link = $objDb->conecta_mysql();
    
    $senha = mysqli_query ($link,"SELECT senha FROM usuarios WHERE id = $id_usuario");
    $rowsenha= mysqli_fetch_array($senha);
    $getsenha=$rowsenha['senha'];

    if($senha_antiga == $getsenha && $nova_senha == $confirma_nova_senha){
    mysqli_query ($link,"UPDATE usuarios SET senha = '$nova_senha' WHERE id = $id_usuario");
    echo 'Alterado com sucesso!';
    } else if($nova_senha != $confirma_nova_senha){
        echo 'A nova senha e sua confirmação são diferentes. Por favor, tente Novamente.';
    } else if($senha_antiga != $getsenha){
        echo 'Esta senha é diferente da cadastrada anteriormente. Corrige os campos e tente novamente.';
    }