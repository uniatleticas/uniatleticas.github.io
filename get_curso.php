<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$sql = " SELECT curso FROM usuarios WHERE id_usuario = $id_usuario ";

	$resultado_id = mysqli_query($link, $sql);
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		if($registro['curso'] == 'sistemasdeinformacao'){
			echo '<h4 class="card-title grey-text text-darken-4" id="info"><?php echo $getnome?> <?php echo $getsobrenome?></h4>';
			echo '<p class="medium-small grey-text" id="curso">Sistemas de Informação</p>' ;
		  } else if($registro['curso'] == 'engenhariacivil'){
			echo '<h4 class="card-title grey-text text-darken-4" id="info"><?php echo $getnome?> <?php echo $getsobrenome?></h4>';
			echo '<p class="medium-small grey-text" id="curso">Engenharia Civil</p>' ;
		  }
		   else if($registro['curso'] == 'contabeis'){
			echo '<h4 class="card-title grey-text text-darken-4" id="info"><?php echo $getnome?> <?php echo $getsobrenome?></h4>';
			echo '<p class="medium-small grey-text" id="curso">contabeis</p>' ;
		  }

	} else {
		echo 'Erro!';
	}

?>