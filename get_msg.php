<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.msg, u.usuario ";
	$sql.= " FROM msg AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";
	$sql.= " WHERE id_usuario = $id_usuario ";
	$sql.= " OR id_usuario IN (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario) ";
	$sql.= " ORDER BY data_inclusao DESC "; 

	$resultado_id = mysqli_query($link, $sql);
	if($resultado_id){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<div id="profile-page-wall-posts"class="row">';
			echo ' <div class="col s12">';
			echo '<div id="profile-page-wall-post" class="card">';
			echo '<div class="card-profile-title">';
			echo '<div class="row">';
			echo '<div class="col s1">';
			echo '<img src="img/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image">';                        
			echo '</div>';
			echo '<div class="col s10">';
            echo '<p class="grey-text text-darken-4 margin">'.$registro['usuario'].'</p>';
            echo '<span class="grey-text text-darken-1 ultra-small">'.$registro['data_inclusao_formatada'].'</span>';
			echo '</div>';
			echo '<div class="col s1 right-align">';
			echo '<i class="mdi-navigation-expand-more"></i>';
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
            echo '<div class="col s12">';
			echo '<p>'.$registro['msg'].'</p>';
			echo '</div>';
            echo '</div>';
			echo '</div>';
			echo '<div class="card-action row">';
            echo '<div class="col s4 card-action-share">';
            echo '<a href="#"><i class="mdi-action-thumb-up small"></i></a>';
            echo '<a href="#"><i class="mdi-action-favorite small"></i></a>';
            echo '</div>';           
            echo '<div class="input-field col s8 margin">';
            echo '<input id="profile-comments small" type="text" class="validate margin">';
            echo '<label for="profile-comments" class="">Comentar</label>';
			echo '</div>';
			echo '</div>';
			echo '</div>';  
		}

	} else {
		echo 'Erro na consulta de mensagens no banco de dados!';
	}

?>