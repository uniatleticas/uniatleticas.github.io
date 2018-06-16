<?php

  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Página Inicial - UniAtléticas</title>
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
	<div class="navbar"> <!-- navbar-fixed não funciona! -->
    <nav class="nav">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo"><img id="logo" src="img/logo.png" width="128" height="72"></a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
           <li class="<?= $erro == 1 ? 'open' : '' ?>">
          <li><a href="Login/login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
          <li><a href="Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
           <li class="<?= $erro == 1 ? 'open' : '' ?>">
          <li><a href="Login/login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
<h4 style="text-align:center; color:white;">Bem-Vindo ao UniAtléticas!</h4>
<h4 style="text-align:center; color:white;">Para entender como funciona o site, assista o vídeo abaixo:</h4>
<iframe width="560" height="315" src="https://www.youtube.com/embed/PhS72sR2q8k?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="display:block; margin:auto;"></iframe>
</body>
</html>