<?php
	$parametro=split(":", $_POST['parametro']);
	switch ($parametro[0]) {
		case '1':
			include_once('../modelo/r_general.php');
			$r_general=new r_general();
			$r_general->idregistro=$parametro[1];
			echo $r_general->obtener($r_general);
			break;
		default:
			// code...
			break;
	}
?>