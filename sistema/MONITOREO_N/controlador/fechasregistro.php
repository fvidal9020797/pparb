<?php
$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/fechasregistro.php');
			$fechasregistro=new fechasregistro();
			$fechasregistro->idregistro=$parametro[1];
			echo $fechasregistro->obtener($fechasregistro);
			break;
		default:
			// code...
			break;
	}
?>