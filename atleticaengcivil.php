<?php
  
  session_start();

  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $id_usuario = $_SESSION['id_usuario'];
  $cursopagina = 'engenhariacivil';
  $curso = mysqli_query($link,"SELECT curso FROM usuarios WHERE id ='$id_usuario'");
  $rowcurso = mysqli_fetch_array($curso);
  $getcurso=$rowcurso['curso'];

  if($cursopagina != $getcurso){
    echo "<script language=\"javascript\">";
    echo "alert('Acesso não permitido. Retornando ao seu Perfil.')";
    echo "</script>";
    header("Refresh:0; url=perfil.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Atlética - UniAtléticas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/logincadastro.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
    <script type="text/javascript">

			$(document).ready( function(){

				//associar o evento de click ao botão
				$('#btn_msg').click( function(){
					
					if($('#texto_msg').val().length > 0){
						
						$.ajax({
							url: 'msgs_atleticas/engcivil/inclui_msg.php',
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
						url: 'msgs_atleticas/engcivil/get_msg.php',
						success: function(data) {
							$('#msgs').html(data);
						}
					});
				}

        function carregaMembros(){
					//carregar os membros

					$.ajax({
						url: 'msgs_atleticas/engcivil/get_membros.php',
						success: function(data) {
							$('#users').html(data);
						}
					});
				}

				atualizaMsg();
        carregaMembros();

			});

		</script>
</head>
<body id="body">
	<style>
	body{	
	background: url('img/perfil.png');
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
          <li><a href="#"><i class="material-icons left">account_circle</i>Bem-vindo(a), <?= $_SESSION['usuario'] ?></a></li>
          <li><a href="sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
          <li><a href="feed.php"><i class="material-icons left">home</i>Feed</a></li>
          <li><a href="busca.php"><i class="material-icons left">search</i>Buscar Usuários</a></li>
          <li><a href="#"><i class="material-icons left">account_circle</i>Bem-vindo(a), <?= $_SESSION['usuario'] ?></a></li>
          <li><a href="sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
        </ul>
      </div>
    </nav>
  </div>
<section id="content">        

        <!--start container-->
        <div class="container">

          <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/capas/engenharias_atletica.jpg" alt="user background">                    
                </div>
                <figure class="card-profile-image">
                    <img src="img/engenharias_avatar.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
                <div class="card-content">
                  <div class="row">                    
                    <div class="col s3 offset-s2">
                    <h4 class="card-title grey-text text-darken-4">Atlética do Curso</h4>                       
                    </div>
                   </div>
                </div>
                <div id="profile-page-content" class="row">
                          <!-- profile-page-sidebar-->
                          <div id="profile-page-sidebar" class="col s12 m4">
                            <!-- Profile About  -->
                            <div class="card light-blue">
                              <div class="card-content white-text">
                                <span class="card-title">Sobre a Atlética</span>
                                <p>Bem-vindo a AAAEU!</p>
                              </div>                  
            </div>
            <ul id="users" class="collection z-depth-1"></ul>
                <ul id="profile-page-about-feed" class="collection z-depth-1">
                    <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 grey-text darken-1 center-align">Usuário</div>
                              </div></li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 black-text darken-1 center-align"><a href="#">Mensagens</a></div>
                                </div>
                              </li>
                  <li class="collection-item">
                   <div class="row">
                      <div class="col s12 black-text darken-1 center-align"><a href="perfil.php">Perfil</a></div>
                   </div>
                  </li>            
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 black-text darken-1 center-align"><a href="configuracoes.php">Configurações</a></div>
                                </div>
                  </li></ul>
                <ul id="profile-page-about-feed" class="collection z-depth-1">
                    <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 grey-text darken-1 center-align">Atlética</div>
                              </li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 black-text darken-1 center-align"><a href="#">Página Inicial</a></div>
                                </div>
                              </li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 black-text darken-1 center-align"><a href="#">Loja Virtual</a></div>
                                </div>
                              </li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 black-text darken-1 center-align"><a href="#">Sair da Atlética</a></div>
                                </div>
                  </li>
                </ul>
            </div>
            <div id="profile-page-wall" class="col s12 m8">
                <!-- profile-page-wall-share -->
                <div id="profile-page-wall-share" class="row">
                  <div class="col s12">
                    <ul class="tabs tab-profile z-depth-1 light-blue">
                      <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#UpdateStatus">Escrever Post</a>
                      </li>                   
                    </ul>
                    <!-- UpdateStatus-->
                    <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          <img src="img/engenharias_avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
	    		                <div class="panel panel-default">
	    		                  <div class="panel-body">
	    				<form id="form_msg" class="input-group">
	    					<input type="text" id="texto_msg" name="texto_msg" class="form-control" placeholder="Escreva sua mensagem"/>
	    				</form>
	    			</div>
	    		</div>
                        <!--<div class="input-field col s10">
                          <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Escreva sua mensagem aqui...</label>
                        </div>-->
                      </div>
                      <div class="row">
                            <span class="input-group-btn">
	    						            <button class="btn btn-default" id="btn_msg" type="button"><i class="mdi-maps-rate-review left"></i>Postar</button>
	    					            </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ profile-page-wall-share -->

                <!-- profile-page-wall-posts -->
                <hr>
                <div id="msgs" class="list-inline" style=""></div>
                <!--<div id="profile-page-wall-posts"class="row">
                  <div class="col s12">
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <div class="col s1">
                              <img src="img/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                            </div>
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin">Gian Michel</p>
                              <span class="grey-text text-darken-1 ultra-small"><i class="mdi-social-public tiny">Público</i> - 27/02/2018</span>
                            </div>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s12">
                              <p>Precisamos de alguem para coordenar nosso time de Vôlei no JUU. Alguem se candidata?</p>
                            </div>
                          </div>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share">
                            <a href="#"><span><i class="mdi-action-thumb-up small"></i> Sim</span></a>
                            <a href="#"><span><i class="mdi-action-thumb-down small"></i >Não</span></a>
                          </div>                       
                        </div>                        
                      </div>-->
                <!--/ profile-page-wall-posts -->

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



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/demo/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/demo/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/demo/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/demo/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/demo/plugins/chartist-js/chartist.min.js"></script>  

    <!-- sparkline -->
    <script type="text/javascript" src="js/demo/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/demo/plugins/sparkline/sparkline-script.js"></script>

     <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>

</body>
</html>