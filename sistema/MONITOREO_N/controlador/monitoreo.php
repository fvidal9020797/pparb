<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/monitoreo.php');
			$monitoreo=new monitoreo();
			$monitoreo->idregistro=$parametro[1];
			echo $monitoreo->listar($monitoreo);
			break;
		case '2':
			include_once('../modelo/monitoreo.php');
			$monitoreo=new monitoreo();
			$monitoreo->idregistro=$parametro[1];
			$monitoreo->anho=$parametro[2];
			echo $monitoreo->listar_tipos_monitoreos($monitoreo);
			break;
		default:
			// code...
			break;
	}
?>