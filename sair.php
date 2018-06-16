<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['email']);

header("Refresh:5; url=index.php");

?>

<html>
<head>
<title>Saindo...</title>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/logincadastro.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Importando Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<style>
	body{	
	background: url('img/perfil.png');
	overflow: scroll;
	}
</style>
<div class="valign-wrapper row login-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
  <form id="formLogoff">
      <div class="card-content">
      	<img id="logo" src="img/logo.png">
        <span class="card-title" style="display:block;">Volte Sempre!</span>
        <div class="row">          
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>