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
    header("Refresh:5; url=../configuracoes.php");
    } else if($nova_senha != $confirma_nova_senha){
        echo 'A nova senha e sua confirmação são diferentes. Por favor, tente Novamente.';
    } else if($senha_antiga != $getsenha){
        echo 'Esta senha é diferente da cadastrada anteriormente. Corrige os campos e tente novamente.';
    }
?>

<html>
<head>
<title>Alterações Efetuadas</title>
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
        <span class="card-title" style="display:block;">Alteração efetuada com sucesso!</span>
        <div class="row">          
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>