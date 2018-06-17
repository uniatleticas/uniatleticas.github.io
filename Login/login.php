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

    <script>
      $(document).ready( function(){

        //verificar se os campos de usuário e senha foram devidamente preenchidos
        $('#btn_login').click(function(){

          var campo_vazio = false;

          if($('#campo_usuario').val() ==''){
            $('#campo_usuario').css({'border-color': '#A94442'});
            campo_vazio=true;
          }

          else{
            $('#campo_usuario').css({'border-color': '#CCC'});
          }

          if($('#campo_email').val() ==''){
            $('#campo_email').css({'border-color': '#A94442'});
            campo_vazio=true;
          }

          else{
            $('#campo_email').css({'border-color': '#CCC'});
          }

          if($('#campo_senha').val() ==''){
            $('#campo_senha').css({'border-color': '#A94442'});
            campo_vazio=true;
          }

          else{
            $('#campo_senha').css({'border-color': '#A94442'});
          }

          if(campo_vazio) return false;
        });
      });         
    </script>
</head>
<body>
<div class="navbar">
    <nav class="nav"> <!-- navbar-fixed não funciona! -->
      <div class="nav-wrapper">
        <a href="../index.php" class="brand-logo"><img id="logo" src="../img/logo.png" width="128" height="72"></a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="../index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="../Cadastro/cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
          <li><a href="login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
        <li><a href="../index.php"><i class="material-icons left">home</i>Home</a></li>
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
        <span class="card-title">Digite seu usuário e senha para continuar</span>
        <div class="row">
          <div class="input-field col s12">
            <label for="email">Usuário</label>
              <input type="text" class="form-control validate" id="campo_usuario" name="usuario" placeholder="Usuario" />
                </div>
          <div class="input-field col s12">
            <label for="password">Senha</label>
            <input type="password" class="form-control validate" id="campo_senha" name="senha" placeholder="Senha" />
                </div>
        </div>
      </div>
      <div class="card-action right-align">
        <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
        <button type="submit" class="btn green waves-effect waves-light form-control">Login</button>
      </div>

      <?php
                if($erro == 1){
                  echo '<font color="#FF0000">Email e ou senha inválido(s)</font>';
                }
              ?>

    </form>
  </div>
</div>
</body>
</html>