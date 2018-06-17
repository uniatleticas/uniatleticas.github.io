<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$sql = " SELECT u.*, us.* ";
	$sql.= " FROM usuarios AS u ";
	$sql.= " LEFT JOIN usuarios_seguidores AS us ";
	$sql.= " ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario) ";
	$sql.= " WHERE u.usuario <> us.id_usuario_seguidor = $id_usuario ";

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		echo '<li class="collection-item">';
        echo '<div class="row">';
        echo '<div class="col s5 grey-text darken-1">Seguidores</div>';
        echo '</li>';
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

					$esta_seguindo_usuario_sn = isset($registro['id_usuario_seguidor']) && !empty($registro['id_usuario_seguidor']) ? 'S' : 'N';

					if($esta_seguindo_usuario_sn == 'N'){
						echo '<li class="collection-item">';
            			echo '<div class="row">';
            			echo '<div class="col s6 black-text darken-1">'.$registro['nome'].' '.$registro['sobrenome'].'</div>';
            			echo '</div>';
           			 	echo '</li>';
					}
		}

	} else {
		echo 'Erro na consulta de usuários no banco de dados!';
	}

?>