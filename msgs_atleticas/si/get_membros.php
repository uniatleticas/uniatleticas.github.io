<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: ../../index.php?erro=1');
	}

	require_once('../../db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = " SELECT nome,sobrenome,curso ";
	$sql.= " FROM usuarios ";
    $sql.= " WHERE curso='sistemasdeinformacao' ";

	$resultado_id = mysqli_query($link, $sql);
	if($resultado_id){
        echo '<li class="collection-item">';
        echo '<div class="row">';
        echo '<div class="col s5 grey-text darken-1">Membros</div>';
        echo '</li>';
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<li class="collection-item">';
            echo '<div class="row">';
            echo '<div class="col s6 black-text darken-1">'.$registro['nome'].' '.$registro['sobrenome'].'</div>';
            echo '</div>';
            echo '</li>';
		}

	} else {
		echo 'Erro na consulta de usuários no banco de dados!';
	}

?>