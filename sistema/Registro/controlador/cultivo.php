<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/cultivo.php');
			$cultivo=new cultivo();
			$cultivo->idcultivo=$parametro[1];
			echo $cultivo->obtener($cultivo);
			break;

		case '2':
			include_once('../modelo/cultivo.php');
			$cultivo=new cultivo();
			echo $cultivo->listar_cultivos();
		break;
	}
?> 