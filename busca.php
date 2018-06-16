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

<!DOCTYPE html>
<html>
<head>
	<title>Buscar Usuários - UniAtléticas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/logincadastro.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
    <!-- Importando Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript">

			$(document).ready( function(){

				//associar o evento de click ao botão
				$('#btn_procurar_pessoa').click( function(){
					
					if($('#nome_pessoa').val().length > 0){
						
						$.ajax({
							url: 'get_pessoas.php',
							method: 'post',
							data: $('#form_procurar_pessoas').serialize(),
							success: function(data) {
								$('#pessoas').html(data);

								$('.btn_seguir').click( function(){
									var id_usuario = $(this).data('id_usuario');

									$('#btn_seguir_'+id_usuario).hide();
									$('#btn_deixar_seguir_'+id_usuario).show();

									$.ajax({
										url: 'seguir.php',
										method: 'post',
										data: { seguir_id_usuario: id_usuario },
										success: function(data){
											alert('Registro efetuado com sucesso!');
										}
									});

								});

								$('.btn_deixar_seguir').click( function(){
									var id_usuario = $(this).data('id_usuario');

									$('#btn_seguir_'+id_usuario).show();
									$('#btn_deixar_seguir_'+id_usuario).hide();

									$.ajax({
										url: 'deixar_seguir.php',
										method: 'post',
										data: { deixar_seguir_id_usuario: id_usuario },
										success: function(data){
											alert('Registro removido com sucesso!');
										}
									});

								});
							}
						});
					}

				});

			});

		</script>
</head>
<body>
	<style>
	body{	
	background: url('img/perfil.jpg');
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

  <div class="container">
	    	   
            <div class="col-md-6">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<form id="form_procurar_pessoas" class="input-group">
	    					<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140" style="color:white;"/>
	    					<span class="input-group-btn">
	    						<button class="btn btn-default" id="btn_procurar_pessoa" type="button"><i class="material-icons left">search</i>Procurar</button>
	    					</span>
	    				</form>
	    			</div>
	    		</div>

	    		<div id="pessoas" class="list-group"></div>

			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
					</div>
				</div>
			</div>
		</div>
    </div>

	</body>
</html>