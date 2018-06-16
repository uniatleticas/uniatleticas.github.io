<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$id_usuario = $_SESSION['id_usuario'];

	//--qtde de msgs
	$sql = " SELECT COUNT(*) AS qtde_msgs FROM msg WHERE id_usuario = $id_usuario ";
	$resultado_id = mysqli_query($link, $sql);
	$qtde_msgs = 0;
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_msgs = $registro['qtde_msgs'];
	} else {
		echo 'Erro ao executar a query';
	}

	//--qtde de seguidores
	$sql = " SELECT COUNT(*) AS qtde_seguires FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario ";
	$resultado_id = mysqli_query($link, $sql);
	$qtde_seguidores = 0;
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_seguidores = $registro['qtde_seguires'];
	} else {
		echo 'Erro ao executar a query';
	}

?>
<html><head>
	<title>Feed - UniAtléticas</title>
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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript">

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
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
          <li><a href="#"><i class="material-icons left">account_circle</i>Bem-vindo(a), <?= $_SESSION['usuario'] ?></a></li>
          <li><a href="sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
        </ul>
        <!-- Menu Responsivo -->
        <ul class="sidenav" id="mobile">
          <li><a href="feed.php"><i class="material-icons left">home</i>Feed</a></li>
          <li><a href="#"><i class="material-icons left">help</i>Ajuda</a></li>
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
            <div id="profile-page-content" class="row">
                          <!-- profile-page-sidebar-->
                          <div id="profile-page-sidebar" class="col s12 m4">
            <ul id="profile-page-about-feed" class="collection z-depth-1">
                    <li class="collection-item">
                                <div class="row">
                                  <div class="col s5 grey-text darken-1">Amigos</div>
                              </div></li>
				<li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Meu Status</div>
                                  <i class="col s6 right-align black-text"> </i><select>
									<option selected="selected" value="online">Online</option>
									<option value="ausente">Ausente</option>
									<option value="offline">Offline</option>
								</select>
                                </div>
                              </li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Vinicius Rodrigues</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align yellow-text"> </i>
                                </div>
                              </li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Vinicius Langholz</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align red-text"> </i>
                                </div>
                              </li>
                  <li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">José Carlos</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align green-text"> </i>
                                </div>
                  </li>
				<li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Philipe Bessa</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align red-text"> </i>
                                </div>
                  </li>
				  <li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Bruna Menezes</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align yellow-text"> </i>
                                </div>
                  </li>
				  <li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Joice Fonseca</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align green-text"> </i>
                                </div>
                  </li>
				  <li class="collection-item">
                                <div class="row">
                                  <div class="col s6 black-text darken-1">Mônica Ribeiro</div>
                                  <i class="col s6 mdi-image-brightness-1 right-align red-text"> </i>
                                </div>
                  </li>
                </ul>
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
                  </li></ul><a href="#">
                </a><ul id="profile-page-about-feed" class="collection z-depth-1"><a href="#">
                    <li class="collection-item">
                                <div class="row">
                                  <div class="col s12 grey-text darken-1 center-align">Atlética</div>
                              </div></li>
                  </a><li class="collection-item"><a href="#">
                                </a><div class="row"><a href="#">
                                  </a><div class="col s12 black-text darken-1 center-align"><a href="#"></a><a href="#">Página Inicial</a></div>
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
                  
                <!--/ profile-page-wall-share -->

                <!-- profile-page-wall-posts -->
                
                <div id="msgs" class="list-inline" style=""><div id="profile-page-wall-posts" class="row"> <div class="col s12"><div id="profile-page-wall-post" class="card"><div class="card-profile-title"><div class="row"><div class="col s1"><img src="img/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image"></div><div class="col s10"><p class="grey-text text-darken-4 margin">gianvelox</p><span class="grey-text text-darken-1 ultra-small">14 May 2018 18:17:31</span></div><div class="col s1 right-align"><i class="mdi-navigation-expand-more"></i></div></div><div class="row"><div class="col s12"><p>oi</p></div></div></div><div class="card-action row"><div class="col s4 card-action-share"><a href="#"><i class="mdi-action-thumb-up small"></i></a><a href="#"><i class="mdi-action-favorite small"></i></a></div><div class="input-field col s8 margin"><input id="profile-comments small" type="text" class="validate margin"><label for="profile-comments" class="">Comentar</label></div></div></div><div id="profile-page-wall-posts" class="row"> <div class="col s12"><div id="profile-page-wall-post" class="card"><div class="card-profile-title"><div class="row"><div class="col s1"><img src="img/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image"></div><div class="col s10"><p class="grey-text text-darken-4 margin">gianvelox</p><span class="grey-text text-darken-1 ultra-small">14 May 2018 18:09:15</span></div><div class="col s1 right-align"><i class="mdi-navigation-expand-more"></i></div></div><div class="row"><div class="col s12"><p>oi</p></div></div></div><div class="card-action row"><div class="col s4 card-action-share"><a href="#"><i class="mdi-action-thumb-up small"></i></a><a href="#"><i class="mdi-action-favorite small"></i></a></div><div class="input-field col s8 margin"><input id="profile-comments small" type="text" class="validate margin"><label for="profile-comments" class="">Comentar</label></div></div></div><div id="profile-page-wall-posts" class="row"> <div class="col s12"><div id="profile-page-wall-post" class="card"><div class="card-profile-title"><div class="row"><div class="col s1"><img src="img/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image"></div><div class="col s10"><p class="grey-text text-darken-4 margin">gianvelox</p><span class="grey-text text-darken-1 ultra-small">14 May 2018 18:04:24</span></div><div class="col s1 right-align"><i class="mdi-navigation-expand-more"></i></div></div><div class="row"><div class="col s12"><p>Olá!</p></div></div></div><div class="card-action row"><div class="col s4 card-action-share"><a href="#"><i class="mdi-action-thumb-up small"></i></a><a href="#"><i class="mdi-action-favorite small"></i></a></div><div class="input-field col s8 margin"><input id="profile-comments small" type="text" class="validate margin"><label for="profile-comments" class="">Comentar</label></div></div></div></div></div></div></div></div></div></div>
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


<div class="hiddendiv common"></div></body></html>