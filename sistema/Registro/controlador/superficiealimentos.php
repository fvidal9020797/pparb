<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]){
		case '1':
			include_once('../modelo/superficiealimentos.php');
			$superficiealimentos=new superficiealimentos();
			$superficiealimentos->idregistro=$parametro[1];
			echo $superficiealimentos->obtener_superficie_alimentos($superficiealimentos);
		break;
	}
?>