<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/plancultivo.php');
			$plancultivo=new plancultivo();
			$plancultivo->idregistro=$parametro[1];
			$plancultivo->anocultivo=$parametro[2];
			echo $plancultivo->obtener_cultivos($plancultivo);
			break;

	}
?>