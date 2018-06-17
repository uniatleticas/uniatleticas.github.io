<?php
  
  session_start();

  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $id_usuario = $_SESSION['id_usuario'];
  $curso = mysqli_query($link,"SELECT curso FROM usuarios WHERE id ='$id_usuario'");
  $rowcurso = mysqli_fetch_array($curso);
  $getcurso=$rowcurso['curso'];
?>
<html><head>
	<title>Configurações - UniAtléticas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/logincadastro.css">
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/cidade-estados-brasil.min.js"></script>
  <script type="text/javascript" src="js/cidades.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<link href="css/materialize-custom.css" type="text/css" rel="stylesheet" media="screen,projection">
  	<link href="css/demo/style.css" type="text/css" rel="stylesheet" media="screen,projection">  
    <link href="css/demo/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/demo/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
  	<link href="css/demo/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  	<link href="js/demo/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  	<link href="js/demo/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
	<!-- Importando Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript">

    function escondeSenha() {
	  var senha = document.getElementById("divsenha");
	  
	  if (senha.style.display === "none") {
			senha.style.display = "block";
	  } else {
			senha.style.display = "none";
	  }
}
    function escondeLocal(){
    var local = document.getElementById("local");
	  if (local.style.display === "none") {
	    local.style.display = "block";
    } else {
		local.style.display = "none";
    }
  }

  function escondeErro(){
    var erro = document.getElementById("reportarerro");
	  if (erro.style.display === "none") {
	    erro.style.display = "block";
    } else {
		erro.style.display = "none";
    }
  }

function escondeEmail(){
    var email = document.getElementById("divemail");
	  if (email.style.display === "none") {
	    email.style.display = "block";
    } else {
		email.style.display = "none";
    }
  }
			$(document).ready( function(){

				//associar o evento de click ao botão
				$('#btn_msg').click( function(){
					
					if($('#texto_msg').val().length > 0){
						
						$.ajax({
							url: 'inclui_msg.php',
							method: 'post',
							data: $('#form_msg').serialize(),
							success: function(data) {
								$('#texto_msg').val('');
								atualizaMsg();
							}
						});
					}

				});

				function atualizaMsg(){
					//carregar os msgs 

					$.ajax({
						url: 'get_msg.php',
						success: function(data) {
							$('#msgs').html(data);
						}
					});
        }

				atualizaMsg();

			});

		</script>
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body>
	<style>
	body{	
	background: url('img/perfilbkg.jpg');
	overflow: scroll;
	}
</style>
	<div class="navbar"> <!-- navbar-fixed não funciona! -->
    <nav class="nav">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo"><img id="logo" src="img/logo.png" width="128" height="72"></a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="feed.php"><i class="material-icons left">home</i>Feed</a></li>
          <li><a href="busca.php"><i class="material-icons left">search</i>Buscar Usuários</a></li>
          <li><a href="perfil.php"><i class="material-icons left">account_circle</i>Bem-vindo(a), <?= $_SESSION['usuario'] ?></a></li>
          <li><a href="sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
        <li><a href="feed.php"><i class="material-icons left">home</i>Feed</a></li>
          <li><a href="busca.php"><i class="material-icons left">search</i>Buscar Usuários</a></li>
          <li><a href="perfil.php"><i class="material-icons left">account_circle</i>Bem-vindo(a), <?= $_SESSION['usuario'] ?></a></li>
          <li><a href="sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
        </ul>
      </div>
    </nav>
  </div>
<section id="content">        

        <!--start container-->
        <div class="container">

        <h4 style="color:white;">Configurações</h4>
            <div id="profile-page-wall" class="col s12 m8">
                <!-- profile-page-wall-share -->
                <div id="profile-page-wall-share" class="row">
                <!--Senha-->
                <form method="POST" action="cfg/alterasenha.php">
                <p style="display:block; text-align:center; color:black;">
                <a style="color:yellow; text-align:center;" onclick="escondeSenha()">Alterar Senha</a>
                <br>
                <span style="color:white;">Caso você não queira mais utlizar sua senha atual ou prefere maior segurança, altere sua senha. 
                Recomendamos que não compartilhe sua senha com ninguém.</span>
                </p>
                <div style="display:none;"id="divsenha">
                <label style="color:white;" for="password">Senha Antiga:</label><input style="color:white; text-align:center;"type="password" name="senha">
                <label style="color:white;" for="password">Digite uma nova Senha:</label><input style="color:white; text-align:center;" type="password" name="novasenha">
                <label style="color:white;" for="password">Confirme a nova Senha:</label><input style="color:white; text-align:center;" type="password" name="confirmarnovasenha">                    
                <button type="submit" class="btn green waves-effect waves-light form-control" style="display:block; margin:auto;">Alterar</button>
                </div>
                </form>
                <!--Estado e Cidade-->
                <p style="display:block; text-align:center; color:black;">
                <a style="color:yellow; text-align:center;" onclick="escondeLocal()">Alterar Estado e Cidade</a>
                <br>
                <span style="color:white;">Se você mudou de cidade ou estado ou sua informação atual está incorreta, pedimos para que atualize sua cidade ou estado.</span>
                </p>
                <form action="cfg/alteraestadocidade.php" method="POST">
                <div style="display:none" id="local">
                <label style="color:white;" for="text">Estado</label><select class="browser-default" id="lista_estados" name="estado"></select>
                <label style="color:white;" for="text">Cidade</label><select class="browser-default" id="lista_cidades" name="cidade"></select>
                <script>
                new statesCitiesBR({
                states: {
                  elementID: "lista_estados",
                  defaultOption: "Selecione um Estado"
                },
                cities: {
                  elementID: "lista_cidades",
                  state: "auto",
                  defaultOption: "Selecione uma Cidade"
                }
                });
                </script>
                <button type="submit" class="btn green waves-effect waves-light form-control" style="display:block; margin:auto;">Alterar</button>
                </div>
                </form>
                <!--Email-->
                <p style="display:block; text-align:center; color:black;">
                <a style="color:yellow; text-align:center;" onclick="escondeEmail()">Alterar Email</a>
                <br>
                <span style="color:white;">Não usa mais seu email, ou deseja alterar? Clique aqui.</span>
                </p>
                <form action="cfg/alteraemail.php" method="POST">
                <div style="display:none" id="divemail">
                <label style="color:white;" for="email">Email Antigo</label><input style="color:white; text-align:center;" type="email" name="email">
                <label style="color:white;" for="email">Novo Email</label><input style="color:white; text-align:center;" type="email" name="novoemail">
                <button type="submit" class="btn green waves-effect waves-light form-control" style="display:block; margin:auto;">Alterar</button>
                </div>
                </form>
                <!--Reportar Erro-->
                <p style="display:block; text-align:center; color:black;">
                <a style="color:yellow; text-align:center;" onclick="escondeErro()">Reportar Erro</a>
                <br>
                <span style="color:white;">Se você trocou alguma dessas informações e não houve mudança, ou seu nome, sobrenome esta incorreto ou qualquer outro erro, 
                entre em contato conosco, deixe sua mensagem relatando seu erro, resolveremos o mais rapido possivel.</span>
                </p>
                <form action="envia_contato.php" method=POST>
                <div style="display:none" id="reportarerro">
                <label style="color:white;" for="text">Nome</label><input style="color:white; text-align:center;" type="text" name="nome">
                <label style="color:white;" for="email">Email</label><input style="color:white; text-align:center;" type="email" name="email">
                <label style="color:white;" for="text">Mensagem</label><textarea style="color:white;" name="mensagem" rows="4" cols="50"></textarea>
                <button type="submit" class="btn green waves-effect waves-light form-control" style="display:block; margin:auto;">Enviar</button>
                </div>
                </form>
              </div>
              <!--/ profile-page-wall -->

            </div>
          </div>
        </div>
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2018 <a class="grey-text text-lighten-4" href="#" target="_blank">UniAtléticas</a> Todos os Direitos Reservados.</span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



<div class="hiddendiv common"></div></body></html>