<?php

  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - UniAtléticas</title>
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
<div class="navbar">
    <nav class="nav"> <!-- navbar-fixed não funciona! -->
      <div class="nav-wrapper">
        <a href="../index.php" class="brand-logo"><img id="logo" src="../img/logo.png" width="128" height="72"></a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="../index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
          <li><a href="../Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
          <li><a href="login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
        <li><a href="../index.php"><i class="material-icons left">home</i>Home</a></li>
        <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
        <li><a href="../Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
        <li><a href="login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
<div class="valign-wrapper row login-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
    <form method="post" action="validar_acesso.php" id="formLogin">
      <div class="card-content">
      	<img id="logo" src="../img/logo.png">
        <span class="card-title">Digite seu email e senha para continuar</span>
        <div class="row">
          <div class="input-field col s12">
            <label for="email">Endereço de Email</label>
            <input type="email" class="validate" name="campo_email" id="email" />
          </div>
          <div class="input-field col s12">
            <label for="password">Senha</label>
            <input type="password" class="validate" name="campo_senha" id="password" />
          </div>
        </div>
      </div>
      <div class="card-action right-align">
        <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
        <input type="submit" class="btn green waves-effect waves-light" value="Login">
      </div>

      <?php
                if($erro == 1){
                  echo '<font color="#FF0000">Email e ou senha inválido(s)</font>';
                }
              ?>

    </form>
  </div>
</div>
<!-- <div id="cabecalho">
</div>
<form id="Formulario" action="../index.php" method="POST">
<br>
<img id="logo" src="../img/logo.png">
<br>
<label>Email</label>
<input id="email" type="email" name="email" required="true"></input>
<br>
<label>Senha</label>
<input id="senha" type="password" required="true"></input>
<br>
<input type="image" src="../img/btn_entrar.png" alt="Submit" width="128" height="70"></input>
<br>
</form>
<br>
<input type="image" id="cadastrobtn" onclick="window.location.href='../Cadastro/cadastro.php'" src="../img/balao_cadastro.png" alt="Submit"></input>
</div>
-->
</body>
</html>