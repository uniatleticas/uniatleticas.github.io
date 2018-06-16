<?php

	require_once('../db.class.php');

	$usuario = $_POST['usuario'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$confirmar_email = $_POST['confirmar_email'];
	$senha = md5($_POST['senha']);
	$confirmar_senha = md5($_POST['confirmar_senha']);
	$curso = $_POST['curso'];
	$cidade = $_POST['cidade'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;

	//verificar se o usuário já
	$sql = " select * from usuarios where usuario = '$usuario' ";
	if($resultado_id = mysqli_query($link, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){
			$usuario_existe = true;
		}
	} else {
		echo 'Erro ao tentar localizar o registro de usuário';
	}

	//verificar se o e-mail já
	$sql = " select * from usuarios where email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		} 
	} else {
		echo 'Erro ao tentar localizar o registro de email';
	}


	if($usuario_existe || $email_existe){

		$retorno_get = '';

		if($usuario_existe){
			$retorno_get.= "erro_usuario=1&";
		}

		if($email_existe){
			$retorno_get.= "erro_email=1&";
		}

		header('Location: cadastro.php?'.$retorno_get);
		die();
	}

	$sql = "insert into usuarios(usuario, nome, sobrenome, email, confirmar_email, senha, confirmar_senha, curso, cidade) values ('$usuario', '$nome', '$sobrenome', '$email', '$confirmar_email', '$confirmar_senha', '$senha', '$curso', '$cidade')";

	//executar a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
		header('Location: ../Login/login.php');
	} else {
		echo 'Erro ao registrar o usuário!';
		echo $curso;
	}


?>