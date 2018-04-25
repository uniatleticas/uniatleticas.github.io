<!DOCTYPE html>
<html>
<head>
	<title>Cadastro - UniAtléticas</title>
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
<div class="navbar"> <!-- navbar-fixed não funciona! -->
    <nav class="nav">
      <div class="nav-wrapper">
        <a href="../index.php" class="brand-logo"><img id="logo" src="../img/logo.png" width="128" height="72"></a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="../index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
          <li><a href="cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
          <li><a href="../Login/login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
          <li><a href="../index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
          <li><a href="cadastro.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
          <li><a href="../Login/login.php"><i class="material-icons left">exit_to_app</i>Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
<div class="valign-wrapper row signup-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
    <form method="post" action="registra_usuario.php" id="formCadastrarse">
      <div class="card-content">
      	<img id="logo" src="../img/logo.png">
        <span class="card-title">Digite seus dados abaixo e clique em Cadastrar</span>
        <div class="row">
          <div class="input-field col s6">
            <label for="nome">Nome</label>
            <input type="text" class="validate" name="nome" id="nome" required="required" />
          </div>
          <div class="input-field col s6">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="validate" name="sobrenome" id="sobrenome" required="required" />
          </div>
          <div class="input-field col s6">
            <label for="senha">Senha</label>
            <input type="password" class="validate" name="senha" id="senha" required="required" />
          </div>
          <div class="input-field col s6">
            <label for="confirmasenha">Confirmar Senha</label>
            <input type="password" class="validate" name="confirmar_senha" id="confirmarsenha" required="required" />
          </div>
          <div class="input-field col s6">
          	<label for="email">Email</label>
          	<input type="email" class="validate" name="email" id="email" required="required"></input>
          </div>
          <div class="input-field col s6">
          	<label for="email">Confirmar Email</label>
          	<input type="email" class="validate" name="confirmar_email" id="confirmaremail" required="required"></input>
          </div>
          <div class="input-field col s6">
            <label for="text">Curso</label>
            <input type="text" class="validate" name="curso" id="curso" required="required"></input>
          </div>
          <div class="input-field col s6">
            <label for="text">Cidade</label>
            <input type="text" class="validate" name="cidade" id="cidade" required="required"></input>
          </div>
        </div>
      </div>
      <div class="card-action right-align">
        <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
        <input type="submit" class="btn green waves-effect waves-light" value="Cadastrar">
      </div>
    </form>
  </div>
</div>
<!--
<div id="cabecalho">	
</div>
<br>
<div id="corpo">
<form id="Formulario" action="../Login/login.php" method="POST">
<img id="logo" src="../img/logo.png">
<label>Nome</label>
<input id="nome" type="text" required="true"></input>
<br>
<label>Sobrenome</label>
<input id="sobrenome" type="text" required="true"></input>
<br>
<label>Senha</label>
<input id="senha" type="password" required="true"></input>
<br>
<label>Confirmar Senha</label>
<input id="confirmasenha" type="password" required="true"></input>
<br>
<label>Email</label>
<input id="email" type="email" required="true"></input>
<br>
<label>Estado</label>
<select id="estado" required="true">
	<option disabled selected>Selecione seu Estado</option>
	<option>Minas Gerais</option>
</select>
<br>
<label>Cidade</label>
<select id="cidade" required="true">
	<option disabled selected>Selecione sua Cidade</option>
	<option>Patos de Minas</option>
	<option>Lagoa Formosa</option>
	<option>Presidente Olegário</option>
	<option>João Pinheiro</option>
	<option>Carmo do Paraníba</option>
</select>
<br>
<label>Curso</label>
<select id="curso" required="true">
	<option disabled selected>Selecione seu Curso</option>
	<option>Sistemas de Informação</option>
	<option>Agronomia</option>
	<option>Engenharia Civil</option>
</select>
<br>
<input id="cadastrar" type="image" src="../img/btn_entrar.png" alt="Submit" width="128" height="70"></input>
<br>
</form>
<br>
</div>
-->
</body>
</html>