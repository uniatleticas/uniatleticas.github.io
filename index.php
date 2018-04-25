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
          <li><a href="index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
          <li><a href="Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
           <li class="<?= $erro == 1 ? 'open' : '' ?>">
          <li><a href="Login/login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
          <li><a href="index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
          <li><a href="Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
           <li class="<?= $erro == 1 ? 'open' : '' ?>">
          <li><a href="Login/login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
<!--
<button onclick="window.location.href='Login/login.php'">Login</button>
<br>
<button onclick="window.location.href='Cadastro/cadastro.php'">Cadastro</button>
-->
</body>
</html>