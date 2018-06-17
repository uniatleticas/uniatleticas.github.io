<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: ../../index.php?erro=1');
	}

	require_once('../../db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.msg, u.usuario ";
	$sql.= " FROM msg_si AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";
	$sql.= " WHERE id_usuario = $id_usuario ";
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
			echo '<img src="img/si_avatar.jpg" alt="" class="circle responsive-img valign profile-post-uer-image">';                        
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
			echo '</div>';
			echo '</div>';  
		}

	} else {
		echo 'Erro na consulta de mensagens no banco de dados!';
	}

?>