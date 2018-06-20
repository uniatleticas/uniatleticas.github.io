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
	$estado = $_POST['estado'];
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

	$sql = "insert into usuarios(usuario, nome, sobrenome, email, confirmar_email, senha, confirmar_senha, curso, estado, cidade) values ('$usuario', '$nome', '$sobrenome', '$email', '$confirmar_email', '$confirmar_senha', '$senha', '$curso', '$estado', '$cidade')";

	//executar a query
	if(mysqli_query($link, $sql)){
		header("Refresh:5; url=../Login/login.php");
	} else {
		echo 'Erro ao registrar o usuário!';
	}


?>

<html>
<head>
<title>Cadastro Conclúido</title>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/logincadastro.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Importando Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<style>
	body{	
	background: url('../img/perfil.png');
	overflow: scroll;
	}
</style>
<div class="valign-wrapper row login-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
  <form id="formCadastro">
      <div class="card-content">
      	<img id="logo" src="../img/logo.png">
        <span class="card-title" style="display:block;">Cadastro Efetuado com Sucesso!</span>
        <div class="row">          
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>